<?php

// modifiez les 3 paramètre ci dessous pour vous connecter à votre propre base de données (addresse_du_serveur, nom_utilisateur, mot_de_passe)
$con = mysql_connect("sql301.0fees.net","fees0_14337243","j3qxtbh9");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// remplacez la chaine de caractères ci dessous par le nom de votre base de données
mysql_select_db("fees0_14337243_snapchat",$con);

?> 
