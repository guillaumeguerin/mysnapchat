<html>
	<head>
       
	</head>
	<body>
<?php

    include("connectdb.php");

    $link = mysql_connect($db_host, $db_username, $db_password);
    mysql_select_db("user", $link);


    function checkmdp($password)
    {
	    if($password == '') return 'empty';
	    else if(strlen($password) < 4) return 'tooshort';
	    else if(strlen($password) > 50) return 'toolong';
	
	    else
	    {
		    if(!preg_match('#[0-9]{1,}#', $password)) return 'nofigure';
		    else if(!preg_match('#[A-Z]{1,}#', $password)) return 'noupcap';
		    else return 'ok';
	    }
    }

    function checkmdpS($password, $confirmpassword)
    {
	    if($password != $confirmpassword && $password != '' && $confirmpassword != '') return 'different';
	    else return checkmdp($password);
    }

    function checkmail($email)
    {
	    if($email == '') return 'empty';
	    else if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $email)) return 'isnt';
        else return 'ok';	

	    /*else
	    {
		    $result = sqlquery("SELECT COUNT(*) AS nbr FROM membres WHERE membre_mail = '".mysql_real_escape_string($email)."'", 1);
		    global $queries;
		    $queries++;
		
		    if($result['nbr'] > 0) return 'exists';
		    else return 'ok';
	    }*/
    }

    if(isset($_POST['name'])){
        if(isset($_POST['email'])){
            if(checkmail($_POST['email']) == 'ok'){
                echo "email ok <br<br>";
                echo $_POST['password'];
                if(isset($_POST['password'])){
                    echo "password defined";
                    if(isset($_POST['confirmpassword'])){
                        echo checkmdpS($_POST['password'], $_POST['confirmpassword']);
                        if(checkmdpS($_POST['password'], $_POST['confirmpassword']) == 'ok'){

                             $insertion = "INSERT INTO `fees0_14337243_snapchat`.`user` (`ID`, `EMAIL`, `PASSWORD`, `NAME`, `DESCRIPTION`, `PROFILE_PICTURE`, `DIRECTORY`) VALUES (NULL, '". $_POST['email'] ."', '". md5($_POST['password']) ."', '". $_POST['name'] ."', '" . $_POST['description'] . "', '', '');";
    

                            echo $insertion . "<br><br>";
                            if(mysql_query($insertion, $link)){
                                echo 'Registration successful, <a href="login.php">go to login</a> ';
                            }
                            else echo "Registration failed";
                        }
                    }
                }
            }   
        }       
    }

?>

	</body>
</html>
