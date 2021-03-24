FROM asclinux/linuxforphp-8.2-ultimate:7.4-nts
MAINTAINER doug@unlikelysource.com
COPY ./init.sh /tmp/
COPY ./phpmyadmin_install.sh /tmp/
COPY ./composer.phar /tmp/
RUN \
    echo "Installing phpMyAdmin ..." && \
    chmod +x /tmp/*.sh && \
    /tmp/phpmyadmin_install.sh
CMD /tmp/init.sh
