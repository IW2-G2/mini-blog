# mini-blog


## install

Pour commencer à travaillé il faut créer un dossier config, puis un fichier my_setting.ini, dans le dossier config.

dans se fichier il faut ecrire :

```
[database]
driver = mysql
host = localhost
port = 3306
schema = nom_db
username = root
password =
```

Edit: avant de commencer à travailler n'oubliez pas d'excécuter l'installation des dépendances et de l'autoloader composer

```
composer install
```

ou 

```
./composer.phar install
```