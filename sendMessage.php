<?php
    
    include("connectdb.php");
    

    $link = mysql_connect($db_host, $db_username, $db_password);
    mysql_select_db("MESSAGE", $link);

    echo $_GET["type"];
    
    $insertion = "INSERT INTO `fees0_14337243_snapchat`.`MESSAGE` (`MSG_ID`, `MSG_USER_ID_FROM`, `MSG_USER_ID_TO`, `MSG_TYPE`, `MSG_CONTENT`) VALUES (NULL, '". $_POST['from'] ."', '". $_POST['destinataire'] ."', '".$_GET["type"]."', '". $_POST['content'] ."');";

    echo $insertion;

    mysql_query($insertion, $link);
    

    mysql_close($link);
?>
