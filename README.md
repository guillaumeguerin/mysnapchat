mysnapchat
==========

MySnapChat

Guide d'installation :

- Si vous possédez ou souhaitez installer un serveur de type Apache, Php, MySQL comme WAMP server :
  - Copiez tous les fichiers (sauf le dossier SQL) dans le dossier www
  - Connectez-vous à la base de données MySQL (avec phpmyadmin par exemple) et importez la base de donnée SQL qui se trouve sous forme de fichier .sql dans le dossier SQL
  - Dans votre dossier www, modifiez le fichier connect.php dans le répertoire php pour qu'il possède les bonnes données de connection MySQL (adresse du serveur sql, identifiants sql et nom de la base de donnée)


- Si vous possédez ou souhaitez utiliser un hébergement de site web avec Php 5 et MySQL :
  - Copiez tous les fichiers (sauf le dossier SQL) avec un client FTP à la racine du FTP d'hébergement
  - Connectez-vous à la base de données MySQL (avec phpmyadmin par exemple) et importez la base de donnée SQL qui se trouve sous forme de fichier .sql dans le dossier SQL
  - Sur votre FTP, modifiez le fichier connect.php dans le répertoire php pour qu'il possède les bonnes données de connection MySQL (adresse du serveur sql, identifiants sql et nom de la base de donnée)
