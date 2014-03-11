<?php
if(empty($_POST) )
{
echo "Access denied";
}
else
{
  
$q = strval($_POST['q']);

include '../connect.php';

$sql = "UPDATE FRIENDS SET FDS_RELATIONSHIP=1 WHERE FDS_ID = '".$q."'";
mysql_query($sql);



$sqlid_1 = "SELECT FDS_USER_ID_1 FROM FRIENDS WHERE FDS_ID = '".$q."'";
$id_1 = mysql_result(mysql_query($sqlid_1), 0);

$sqlemail = "SELECT EMAIL FROM user WHERE ID = '".$id_1."'";
$email = mysql_result(mysql_query($sqlemail), 0);

$sqlid_2 = "SELECT FDS_USER_ID_2 FROM FRIENDS WHERE FDS_ID = '".$q."'";
$id_2 = mysql_result(mysql_query($sqlid_2), 0);  

$sqldate = "SELECT FDS_DATE FROM FRIENDS WHERE FDS_ID = '".$q."'";
$date = mysql_result(mysql_query($sqldate), 0);  


$sql = "INSERT INTO FRIENDS(FDS_USER_ID_1, FDS_USER_ID_2, FDS_RELATIONSHIP, FDS_DATE) VALUES ('".$id_2."','".$id_1."','1','".$date."');";
mysql_query($sql);

echo $email;

mysql_close($con);
}
?> 