#!/usr/bin/env bash

echo "Installing Composer ..."
cd /tmp
wget https://getcomposer.org/composer.phar
mv /tmp/composer.phar /usr/local/bin/composer
chmod +x /usr/local/bin/composer

echo "Installing Laminas API Tools ..."
cd /home
php composer.phar create-project laminas-api-tools/api-tools-skeleton api-tools

echo "Setting up Apache ..."
echo "ServerName laminas" >> /etc/httpd/httpd.conf
mv -f /srv/www /srv/www.OLD 
ln -s /home/api-tools/public /srv/www

echo "Setting permissions ..."
chown apache:apache /srv/www
chgrp -R apache /home/*
chmod -R 775 /home/*

echo "Initializing MySQL, PHP-FPM and Apache ... "
/etc/init.d/mysql start
/etc/init.d/php-fpm start
/etc/init.d/httpd start

lfphp --mysql --phpfpm --apache
