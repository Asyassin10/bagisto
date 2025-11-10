
Guide Solutions Métier
======================


Prérequis
---------

*   PHP ^8.1
*   Composer
*   MySQL/MariaDB
*   Serveur Web (Apache, Nginx, etc.)
*   Extensions PHP requises :  `curl`, `intl`, `mbstring`, `openssl`, `pdo`, `pdo_mysql`, `tokenizer`

Installation
------------

### Installation de PHP

1.  **Mettez à jour la liste des packages :**
    
        sudo apt update
    
2.  **Ajoutez le dépôt PHP :**
    
        sudo add-apt-repository ppa:ondrej/php
    
3.  **Installez PHP 8.1 et les extensions requises :**
    
        sudo apt install php8.1 php8.1-cli php8.1-common php8.1-curl php8.1-mbstring php8.1-mysql php8.1-xml php8.1-zip php8.1-intl php8.1-bcmath
    
4.  **Vérifiez l'installation :**
    
        php -v
    

Pour des instructions plus détaillées, consultez la [documentation officielle de PHP](https://www.php.net/manual/en/install.unix.debian.php).

### Installation de Composer

1.  **Téléchargez le programme d'installation de Composer :**
    
        php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    
2.  **Vérifiez le SHA-384 de l'installateur** (vérifiez le dernier hash sur [les clés publiques de Composer](https://composer.github.io/pubkeys.html)) :
    
        php -r "if (hash_file('SHA384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installateur vérifié'; } else { echo 'Installateur corrompu'; unlink('composer-setup.php'); } echo PHP_EOL;"
    
3.  **Exécutez le programme d'installation :**
    
        sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
    
4.  **Supprimez le programme d'installation :**
    
        php -r "unlink('composer-setup.php');"
    
5.  **Vérifiez l'installation :**
    
        composer --version
    

Pour plus d'informations, consultez la [documentation officielle de Composer](https://getcomposer.org/doc/00-intro.md).

Installation d'Apache
---------------------

1.  **Installez Apache :**
    
        sudo apt install apache2
    
2.  **Démarrez et activez Apache :**
    
        sudo systemctl start apache2
        sudo systemctl enable apache2
    
3.  **Vérifiez l'installation :**
    
        sudo systemctl status apache2
    

Installation de MySQL
---------------------

1.  **Installez MySQL :**
    
        sudo apt install mysql-server
    
2.  **Configurez MySQL :**
    
        sudo mysql_secure_installation
    
3.  **Vérifiez l'installation :**
    
        sudo systemctl status mysql

Importation de la base de données SQL
-------------------------------------

1.  **Créez une nouvelle base de données :**
    
        sudo mysql -u root -p -e "CREATE DATABASE nom_de_votre_base_de_donnees;"
    
2.  **Importez le fichier SQL :**
    
        sudo mysql -u root -p nom_de_votre_base_de_donnees < /chemin/vers/guide-des-solutions-logicielles/Config_Deployment/database.sql

### Configuration du Projet

1.  **Clonez le dépôt :**
    
        git clone https://gitlab.experts-comptables.org/marketing-ec/guide-des-solutions-logicielles.git
    
2.  **Naviguez vers le répertoire du projet :**
    
        cd guide-des-solutions-logicielles
    
3.  **Installez les dépendances :**
    
        composer install
    
4.  **Copiez le fichier d'exemple `.env` :**
    
        cp .env.example .env
    
5.  **Générez la clé de l'application :**
    
        php artisan key:generate
    
6.  **Configurez votre base de données dans le fichier `.env`.**


### Config de cache 
quand vous installer redis sur le serveur de l'application , vous devez changes ces valeurs dans le fichier .env 

```env
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6305
REDIS_CLIENT=predis
CACHE_DRIVER=file
SESSION_DRIVER=file
```
l'application va verifier si la connecton avec redis est ok , si c'est ok l'application va utiliser redis , si non il va utiliser les fichiers 

enfin vous devez vider les caches avec cette commande : 
```bash
php artisan optimize:Clear 
```
