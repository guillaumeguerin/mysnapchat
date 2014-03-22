<? 
session_start(); 
$serveur = "sql301.0fees.net";
$login = "fees0_14337243";
$motdepasse = "j3qxtbh9";
$nom_base = "fees0_14337243_snapchat";

$base = mysql_connect ($serveur, $login, $motdepasse)or die("Impossible de se connecter : " . mysql_error());
mysql_select_db ($nom_base, $base);
//mysql_select_db("user") or die(mysql_error()); 
$email = $_SESSION['email'];

$result=mysql_query("DELETE FROM user WHERE email='$email'") or die(mysql_error()); 

    //confirm
    echo $email;
   //echo "Patient removed. <a href=dashboard.php>Return to Dashboard</a>";
   
mysql_free_result($result);
mysql_close();
 session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
?>


