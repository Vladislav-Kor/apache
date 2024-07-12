# apache
    apache24 с настройками для сайта который получает данные по замкам orbita с таблицы .mdb файла 

# Установка php
    https://metanit.com/php/tutorial/1.2.php

# Apache
    https://oblako.kz/help/windows/ustanovka-php-apache-na-windows
    c:/Apache24/bin/httpd -k install
    c:/Apache24/bin/httpd -k restart

# php-ini
    ; работа с odbc
    precision = 14
    extension_dir = "C:\php8\ext"
    extension=curl
    extension=mbstring
    extension=openssl
    extension=odbc
    extension=pdo_mysql
    extension=pdo_odbc
    extension=pdo_pgsql
    extension=pdo_sqlite
    extension=pgsql
    extension=shmop

# Скачать драйвер ODBC 

    https://go.microsoft.com/fwlink/?linkid=2266640
