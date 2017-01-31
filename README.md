# Mini-llog


## Installation

Pour commencer, il faut créer un dossier 'config' à la racine du projet, puis créer un fichier 'my_setting.ini', dans ce dossier.

Ensuite, il faut écrire les paramètres suivant dans le fichier 'my_setting.ini' et les adapters à votre configuration de base de données :

```
[database]
driver = mysql
host = localhost
port = 3306
schema = mini_blog
username = root
password =
```

/!\ Avant de commencer à travailler, n'oubliez pas d'excécuter l'installation des dépendances et de l'autoloader composer

```
composer install
```

ou

```
./composer.phar install
```

Attention les tests unitaire utilisent la base de données donc il faut penser à installer la base de données et à utiliser un PHP avec toute les extentions sql pour PDO.
