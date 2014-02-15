<?php
$serveur = "sql301.0fees.net";
$login = "fees0_14337243";
$motdepasse = "j3qxtbh9";
$nom_base = "fees0_14337243_snapchat";

// on teste si le visiteur a soumis le formulaire de connexion

if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password']))) {

$base = mysql_connect ($serveur, $login, $motdepasse);
mysql_select_db ($nom_base, $base);

// on teste si une entrée de la base contient ce couple login / pass
$sql = 'SELECT count(*) FROM user WHERE email="'.mysql_escape_string($_POST['email']).'" AND password="'.mysql_escape_string($_POST['password']).'"';
//echo $sql; 
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
//echo $data;
$data = mysql_fetch_array($req);

mysql_free_result($req);
mysql_close();

// si on obtient une réponse, alors l'utilisateur est un membre
if ($data[0] == 1) {
//session_start();
//$_SESSION['email'] = $_POST['email'];
//header('Location: membre.php');
//header('Location: login.php');
echo 'Connexion réussie';
//exit();
}
// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
elseif ($data[0] == 0) {
echo 'Compte non reconnu.';
}
// sinon, alors la, il y a un gros problème :)
else {
 echo 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
}

} else {
  echo 'Au moins un des champs est vide.';
}


?>



