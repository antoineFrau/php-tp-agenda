# TP Agenda

https://github.com/antoineFrau/php-tp-agenda 

## Requirements
Avoir un serveur web local, avec PHP, MySQL ect..

## Install
### SQL
Executer le script `db-mysql/agenda_DB.sql` pour avoir la structure de la base de données (s'occupe de créer la base de données "agenda").
Changer dans le fichier de configuration `config/BDConfig.php` afin qu'il corresponde à votre serveur local.
```
define('DB_USER',  'root');
define('DB_PASSWORD','root');
define('DB_PORT','8889');
```

### Serveur
Le site ce construit grace au fichier `index.php`. Il n'y a rien d'autre a faire à part se balader sur le site.
Pour ajouter un évènement il suffit de cliquer sur le jour souhaité et renseigné le titre de l'évènement. 
On peut aussi sélectionner plusieurs jours pour faire un évènement sur plusieurs jours..


## Author
Antoine Frau - Master 1 Développement Full-Stack.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
