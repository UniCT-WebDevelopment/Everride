# EverRide

Social per condividere foto, percorsi gps ed esperienze 

## Description

Questo progetto implementa le basilari funzioni di un Social network: Registrazione utenti,caricamento di foto, follow, like, commenti e feed degli utenti.
Oltre a queste sono presenti delle funzioni per aggiungere dei veicoli al tuo garage virtuale, e per registrare e visualizzare dei percorsi gps su una mappa,
è possibile sia caricare il file gps o usare il sito stesso per avviare una localizzazione attiva(ovviamente si necessita di un dispositivo dotato di gps).

## Getting Started

Queste istruzioni ti consentiranno di avere una copia esatta del progetto nella tua macchina.


### Prerequisites

Per servire il sito web arai bisogno dei seguenti software/librerie:

```
Laravel Framework 7.9.2
Composer version 1.10.5
PHP >= 7.2.5
Node 12.18.0
Npm 6.14.4
MariaDB 10.1.44
Vue.js 2.6.11 
OpenStreetMap.js
OpenLayers.js
Intervention Image(PHP library)
Mailtrap
Git

```

### Installing

#### Istruzioni punto per punto su come caricare il progetto in una distribuzione linux mint nuova:

##### Laravel e PHP

1. sudo apt update
2. sudo apt upgrade
3. sudo apt install git
4. sudo apt install php (7.2 o superiore)
5. php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
6. php -r "if (hash_file('sha384', 'composer-setup.php') === 'e5325b19b381bfd88ce90a5ddb7823406b2a38cff6bb704b0acc289a09c8128d4a8ce2bbafcd1fcbdc38666422fe2806') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
7. php composer-setup.php
8. php -r "unlink('composer-setup.php');"
9. spostare composer.phar in una cartella presente nel $PATH
   sudo mv composer.phar /usr/local/bin/composer
10. installare tutti i componenti richiesti dal composer nel mio caso:
    sudo apt-get install php7.2-zip
    sudo apt-get install php7.2-dom
11. composer global require laravel/installer
12. PATH=~/.config/composer/vendor/bin:$PATH 
13. sudo nano .bashrc aggiungere il comando precedente
14. mkdir LaravelProjects

##### Database

15. apt install mariadb-server mariadb-client
16. sudo systemctl start mariadb
17. sudo mysql -u root
18. CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';
18. GRANT ALL ON *.* TO 'admin'@'localhost' WITH GRANT OPTION;
20. FLUSH PRIVILEGES;
21. composer create-project phpmyadmin/phpmyadmin
22. sudo apt-get install php7.2-mysqli
23. sudo apt-get install php7.2-curl

##### Node.js
 
24. curl -sL https://deb.nodesource.com/setup_12.x | sudo -E bash -
25. sudo apt-get install -y nodejs

##### Configurazione e sviluppo

26. git clone https://github.com/LongLife98/SocialRides.git
27. modificare il .env inserendo i valori del database
28. php artisan migrate
29. npm install
30. npm audit fix
31. npm run dev
32. composer require intervention/image
33. sudo apt-get install php7.2-gd
34. composer install
35. php artisan storage:link
36. php artisan serve


## Built With

* [Laravel](https://laravel.com/) - The web framework used
* [Node](https://nodejs.org/it/) - Dependency Management
* [OpenStreetMap](https://rometools.github.io/rome/) - Used to generate RSS Feeds


## Authors

* **Damiano Di Franco**  [LongLife98](https://github.com/LongLife98)

