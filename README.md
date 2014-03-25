mysnapchat
==========

MySnapChat

Guide d'installation :
- Soit installer un serveur de type Apache, Php, MySQL comme WAMP server et copier tous les fichiers (sauf le dossier SQL) dans le dossier www, soit se procurer un hébergement et copier tous les fichiers (sauf le dossier SQL) avec un client FTP à la racine du FTP d'hébergement
- Se connecter à la base de données MySQL (avec phpmyadmin par exemple) et importer la base de donnée SQL qui se trouve sous forme de fichier .sql dans le dossier SQL
- Modifier le fichier connect.php dans le répertoire php pour qu'il possède les bonnes données de connection MySQL (adresse du serveur sql, identifiants sql et nom de la base de donnée)
