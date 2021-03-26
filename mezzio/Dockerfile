FROM asclinux/linuxforphp-8.2-ultimate:7.4-nts
MAINTAINER doug@unlikelysource.com
COPY ./init.sh /tmp/
COPY ./phpmyadmin_install.sh /tmp/
COPY ./php3.sql /tmp/
RUN \
    echo "Creating sample database and assigning permissions ..." && \
    /etc/init.d/mysql start && \
    sleep 5 && \
    mysql -uroot -v -e "CREATE DATABASE php3;" && \
    mysql -uroot -v -e "CREATE USER 'vagrant'@'localhost' IDENTIFIED BY 'vagrant';" && \
    mysql -uroot -v -e "GRANT ALL PRIVILEGES ON *.* TO 'vagrant'@'localhost';" && \
    mysql -uroot -v -e "FLUSH PRIVILEGES;" && \
    echo "Restoring sample database ..." && \
    mysql -uroot -e "SOURCE /tmp/php3.sql;" php3
RUN \
    echo "Installing phpMyAdmin ..." && \
    chmod +x /tmp/*.sh && \
    /tmp/phpmyadmin_install.sh
RUN \
	echo "Installing Composer ..." && \
	cd /tmp && \
	wget https://getcomposer.org/composer.phar && \
	mv /tmp/composer.phar /usr/local/bin/composer && \
	chmod +x /usr/local/bin/composer
CMD /tmp/init.sh
