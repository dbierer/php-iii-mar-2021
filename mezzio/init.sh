#!/usr/bin/env bash

echo "Setting up Apache ..."
echo "ServerName mezzio-project" >> /etc/httpd/httpd.conf
mv -f /srv/www /srv/www.OLD 
ln -s /home/mezzio-project/public /srv/www

echo "Setting permissions ..."
chown apache:apache /srv/www
chgrp -R apache /home
chmod -R 775 /home

echo "Initializing MySQL, PHP-FPM and Apache ... "
/etc/init.d/mysql start
/etc/init.d/php-fpm start
/etc/init.d/httpd start

lfphp --mysql --phpfpm --apache
