FROM asclinux/linuxforphp-8.2-ultimate:7.4-nts
MAINTAINER doug@unlikelysource.com
COPY ./init.sh /tmp/
COPY ./phpmyadmin_install.sh /tmp/
COPY ./php3.sql /tmp/
COPY ./propulsion_systems.sql /tmp/
RUN \
    echo "Creating sample database and assigning permissions ..." && \
    /etc/init.d/mysql start && \
    sleep 5 && \
    mysql -uroot -v -e "CREATE DATABASE php3;" && \
    mysql -uroot -v -e "CREATE USER 'vagrant'@'localhost' IDENTIFIED BY 'vagrant';" && \
    mysql -uroot -v -e "GRANT ALL PRIVILEGES ON *.* TO 'vagrant'@'localhost';" && \
    mysql -uroot -v -e "FLUSH PRIVILEGES;" && \
    echo "Restoring sample database ..." && \
    mysql -uroot -e "SOURCE /tmp/php3.sql;" php3 && \
    mysql -uroot -e "SOURCE /tmp/propulsion_systems.sql;" php3
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
RUN \
	echo "Installing Laminas API Tools ..." && \
	cd /home && \
	composer create-project laminas-api-tools/api-tools-skeleton api-tools && \
	sed -i 's/%%HOST%%/api-tools/g' /tmp/init.sh
CMD /tmp/init.sh
