# Carla's website

Using my basic PHP Framework

### how to
* cd /project_path
* composer install
* php migrations.php
* cd public
* php -S localhost:8080

### PHP version
    >=7.4

### Apache module required
    sudo a2enmod rewrite

### Apache Virtualhost production configurations
    RewriteEngine On
    #Esta configuracao vale ouro. demorei dias a chegar a uma configuracao que funcione.
    RewriteCond %{DOCUMENT_ROOT}/$1 -f [OR]
    RewriteCond %{DOCUMENT_ROOT}/$1 -d
    RewriteRule (.*) - [S=2]
    RewriteRule (.*) /index.php?q=$1 [L]
