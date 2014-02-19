<?php

$serveur = "sql301.0fees.net";
$login = "fees0_14337243";
$motdepasse = "j3qxtbh9";
$nom_base = "fees0_14337243_snapchat";

// on teste si le visiteur a soumis le formulaire de connexion


echo $_POST['recaptcha_response_field'];




if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password']))) {


$base = mysql_connect ($serveur, $login, $motdepasse)or die("Impossible de se connecter : " . mysql_error());
mysql_select_db ($nom_base, $base);


// on teste si une entrée de la base contient ce couple login / pass
$sql = 'SELECT count(*) FROM user WHERE email="'.mysql_escape_string($_POST['email']).'" AND password="'.mysql_escape_string($_POST['password']).'"';


$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

$data = mysql_fetch_array($req);

$requser = 'SELECT name FROM user WHERE email="'.mysql_escape_string($_POST['email']).'" AND password="'.mysql_escape_string($_POST['password']).'"';
$userquery = mysql_query($requser) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$username = mysql_fetch_array($userquery);


mysql_free_result($requser);
mysql_free_result($req);
mysql_close();



// si on obtient une réponse, alors l'utilisateur est un membre
if ($data[0] == 1) {
echo 'compte invalide';
session_start();
$_SESSION['email'] = $_POST['email'];
$_SESSION['curent_user'] = $username[0];
header('Location: messages.php');
exit();
}
// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
else{

header('Location: login.php');

echo 'compte invalide';
}
}

?>
