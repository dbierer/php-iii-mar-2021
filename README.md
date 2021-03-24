# PHP-III Mar 2021

## TODO
* Get APCU demo to work correctly!
  * Seel `apcu_test.php` in the course repo
* For the JMeter load test: s/be `orderapp.com` or `orderapp`?

## Homework
* For Fri 26 Mar 2021
  * Lab: Building a REST Service API
    * Not PHP 8 ready yet!!!
    * Install `Laminas API Tools`:
```
cd /home/vagrant/Zend/workspaces/DefaultWorkspace
cd apigility
rm -rf *
rm -rf .*
docker run -l apigility -v `pwd`:/home -p 9999:80 -d asclinux/linuxforphp-8.2-ultimate:7.4-nts
docker exec -it apigility /bin/bash
cd /home
wget https://getcomposer.org/composer.phar
php composer.phar create-project laminas-api-tools/api-tools-skeleton apigility
mv /srv/www /srv/www.OLD
ln -s /home/apigility/public /srv/www
```
    * From your browser: `http://localhost:9999`
    * Change any `Zend` references to `Laminas`
  * Lab: REST Service Code Review and Stub Development
  * Lab: REST Service Model Code Setup
  * Lab: REST Service Testing
* For Wed 24 Mar 2021
  * Lab: Phing Labs
    * Phing Build Prerequisites
    * Phing Build Execution
    * Phing Deployment Update
  * Lab: Jenkins CI
    * Jenkins Freestyle Prerequisites
    * Jenkins CI Freestyle Project Configuration
      * NOTE: the URL mentioned on slides is this: https://github.com/datashuttle/PHP3OA
      * OPTIONAL: fork the repo from datashuttle into your own github account and use that as a target repo you can then make changes and test to see if the automated process kicks in
    * Jenkins CI Freestyle Project Build
  * Lab: Apache JMeter: Load (Smoke) Testing
    * Under Step #6: if `orderapp.com` doesn't work, change this to `orderapp`
* For Mon 22 Mar 2021
  * Lab: Built-in Web Server
  * Lab: New Functions (Custom Extension)
    * Installing a Custom Extension
      * Change to this directory: `/home/vagrant/Zend/workspaces/DefaultWorkspace/php3/src/ModAdvancedTechniques/Extensions/TelemetryExtension`
      * Copy the `Makefile` in this repo `src/ModAdvancedTechniques/Extensions/TelemetryExtension/Makefile`
        * Change this: `INIT_DIR` to `/etc/php/8.0/cli/conf.d`
      * If you get this error: `make: Nothing to be done for 'all'.`
        * First run `make clean`
      * Lab uses PHP-CPP
        * See: http://www.php-cpp.com/
        * See: http://www.php-cpp.com/documentation/your-first-extension
        * Not yet PHP 8 ready!  Sorry :-(
    * Rapid extension prototyping: FFI
      * See: https://www.php.net/FFI
      * Examples: https://github.com/dbierer/PHP-8-Programming-Tips-Tricks-and-Best-Practices/tree/main/ch04
  * Lab: Custom Compile PHP (214)
    * Add this prefix to prevent overwriting the existing PHP installation: `--prefix=/usr/local`
    * See: https://lfphpcloud.net/articles/adventures_in_custom_compiling_php_8
    * Read through requirements here (README): https://github.com/php/php-src
* For Wed 16 Mar 2021
  * Get VM up and running
  * OPTIONAL: update phpMyAdmin
     * Use `phpmyadmin_install.sh` in this repo
  * Setup Apache JMeter
  * Setup Jenkins CI
    * Need to install Jenkins 1st!
    * OR ... consider running as Docker image
      * https://www.jenkins.io/doc/book/installing/docker/
      * To start the container running:
```
docker run -d -p 8080:8080 -p 50000:50000 -v jenkins_home:/var/jenkins_home jenkins/jenkins:lts
```
    * The CheckStyle plug-in reached end-of-life. All functionality has been integrated into the Warnings Next Generation Plugin.
    * Same applies to `warnings` and `pmd` : integrated into `Warnings NG`
    * Here are some other suggestions for initial setup:
      * replace `checkstyle` with `Warnings Next Generation`
      * replace `build-environment` with `Build Environment`
      * replace `phing` with `Phing`
      * replace `violations` with `Violations`
      * replace `htmlpublisher` with `Build-Publisher` (???)
      * replace `version number` with `Version Number`

## Q & A
* Q: What is this syntax called? `[$obj, 'method']`?
* A: Unable to find an official name for this syntax, but it's mentioned in the docs:
  * See: https://www.php.net/manual/en/language.types.callable.php

* Q: Can you provide a practical example using `SplObjectStorage`?
* A: This example uses `SplSubject`, `SplObserver` and `SplObjectStorage` to implement a REST API
  * https://github.com/dbierer/classic_php_examples/blob/master/oop/oop_subject_observer_storage_object.php
* A: Good discussion about using arrays vs. `SplObjectStorage`: 
  * https://stackoverflow.com/questions/8520241/associative-array-versus-splobjectstorage

* Q: What is `opcache.interned_strings_buffer`?
* A: The amount of memory used to store interned strings in MB
* A: See: https://www.php.net/manual/en/opcache.configuration.php#ini.opcache.interned-strings-buffer

* Q: What is an "interned" string?
* A: Any strings interned in the startup phase. Common to all the threads, won't be free'd until process exit. If we want an ability to add permanent strings even after startup, it would be still possible on costs of locking in the thread safe builds.
* A: See: https://github.com/php/php-src/blob/master/Zend/zend_string.c

## VM
* Update phpMyAdmin using this script:
  * https://github.com/dbierer/php-ii-mar-2021/blob/main/tools/phpmyadmin_510.sh

## Resources
* Previous class notes:
  * https://github.com/dbierer/php-class-notes/blob/master/php-iii-jan-2021.md
* Previous class repos:
  * https://github.com/dbierer/php-iii-may-2019
* PHP CLI libraries
  * https://github.com/symfony/console
  * 
## Class Notes
* DateTime
  * Format codes: https://www.php.net/manual/en/datetime.format.php
  * International DateTime formatting: https://www.php.net/manual/en/intldateformatter.format.php
* DatePeriod Example
  * https://www.php.net/DatePeriod
  * https://github.com/dbierer/classic_php_examples/blob/master/date_time/date_time_date_period.php
* Relative `DateInterval` formats
  * http://php.net/manual/en/datetime.formats.relative.php
* Relative `DateInterval` formats
  * http://php.net/manual/en/datetime.formats.relative.php
* Method argument data type hints doesn't prevent property's data type from being changed
  * See: https://github.com/dbierer/PHP-8-Programming-Tips-Tricks-and-Best-Practices/blob/main/ch01/php7_prop_danger.php
  * Solution: as of PHP 7.4 you can assign data types at the property level
* Union types
  * https://wiki.php.net/rfc/union_types_v2
  * https://github.com/phpcl/phpcl_core_php8_developers/blob/master/examples/core_cool_union_types.php
### SPL
* `SplDoublyLinkedList` Example
  * https://github.com/dbierer/PHP-8-Programming-Tips-Tricks-and-Best-Practices/blob/main/ch05/php8_spl_spldoublylinkedlist.php
* `SplHeap` Example
  * https://github.com/dbierer/PHP-8-Programming-Tips-Tricks-and-Best-Practices/blob/main/ch05/php8_spl_splheap.php
  * Core algorithm, see: https://github.com/php/php-src/blob/master/ext/spl/spl_heap.c
* Weak References
  * https://wiki.php.net/rfc/weakrefs
  * https://github.com/phpcl/phpcl_core_php8_developers/blob/master/examples/core_cool_weak_ref.php
* Weak Map Class: alternative to `SplObjectStorage`
  * https://wiki.php.net/rfc/weak_maps
  * https://github.com/phpcl/phpcl_core_php8_developers/blob/master/examples/core_cool_weak_map.php
* Stacked Iterators:
  * https://github.com/dbierer/php7cookbook/blob/master/source/chapter03/chap_03_developing_functions_stacked_iterators.php
  * In: https://github.com/dbierer/SimpleHtml/blob/main/src/Common/View/Html.php
    * See `getCardIterator()` method, and
    * `injectCards()` this line: `$iter = new LimitIterator($temp, 0, (int) $qualifier);`
    * Limits iterations returned from the card iterator
* `RecursiveDirectoryIterator` Example
  * https://github.com/dbierer/classic_php_examples/blob/master/oop/oop_spl_recursive_directory_iterator.php
* Subject/Observer Example
  * https://github.com/dbierer/php7cookbook/blob/master/source/chapter11/chap_11_pub_sub_simple_example.php
  * https://github.com/dbierer/php7cookbook/blob/master/source/Application/PubSub/Publisher.php
  * https://github.com/dbierer/php7cookbook/blob/master/source/Application/PubSub/Subscriber.php
* Autoloading
  * `__autoload()` support has been removed in PHP 8
  * `spl_autoload_register()` 2nd param causes it to throw `Exception` if autoloader fails to register
  * In PHP 8 a fatal `Error` is thrown instead: 2nd param is ignored
  * See: https://github.com/dbierer/PHP-8-Programming-Tips-Tricks-and-Best-Practices/blob/main/ch05/php7_spl_spl_autoload_register.php
  * Composer: https://getcomposer.org/doc/04-schema.md#autoload
### PHP Advanced
* Quick one-off commands:
  * Look at the PHP command in `phpmyadmin_install.sh`
* If you want to create an interactive PHP CLI utility, use `readline()`
  * https://www.php.net/manual/en/function.readline.php
* Using the *php* wrapper to implement a REST server:
  * https://github.com/dbierer/php7cookbook/blob/master/source/chapter07/chap_07_simple_rest_server.php
  * See line 23: https://github.com/dbierer/php7cookbook/blob/master/source/Application/Web/Rest/Server.php
* Streams
  * Connect streaming devices (e.g. webcams, mainframes, machines, etc.)
    * https://www.php.net/manual/en/function.stream-socket-client.php
* APCu Extension
  * Replaces the unmaintained APC extension
  * Does not do any opcode cache: strictly for PHP developers who want to add caching to their code
  * Cache is persistent between requests (!)
  * Cache is stored in server shared memory
  * Need to set the `apc.shm_size` php.ini directive (See: https://www.php.net/manual/en/apcu.configuration.php)
  * Save to cache: `apcu_store()`
  * Retrieve from cache: `apcu_fetch()`
* laminas/laminas-cache
  * https://docs.laminas.dev/laminas-cache/
  * Replaced zendframework/zend-cache
* OpCache
  * Added Just-In-Time (JIT) compiler in PHP 8
  * https://wiki.php.net/rfc/jit
* Custom PHP `configure` example:
```
sudo apt install libkrb5-dev zlib1g-dev libbz2-dev libcurl4-openssl-dev libgdbm-dev 
./configure  \
    --prefix=/usr/local \
    --sysconfdir=/etc \
    --localstatedir=/var \
    --datadir=/usr/share/php \
    --mandir=/usr/share/man \
    --enable-fpm \
    --with-fpm-user=apache \
    --with-fpm-group=apache \
    --with-config-file-path=/etc \
    --with-zlib \
    --enable-bcmath \
    --with-bz2 \
    --enable-calendar \
    --enable-dba=shared \
    --with-gdbm \
    --with-gmp \
    --enable-ftp \
    --with-gettext=/usr \
    --enable-mbstring \
    --enable-pcntl \
    --with-pspell \
    --with-readline \
    --with-snmp \
    --with-mysql-sock=/run/mysqld/mysqld.sock \
    --with-curl \
    --with-openssl \
    --with-openssl-dir=/usr \
    --with-mhash \
    --enable-intl \
    --with-libdir=/lib64 \
    --enable-sockets \
    --with-libxml \
    --enable-soap \
    --enable-gd \
    --with-jpeg \
    --with-freetype \
    --enable-exif \
    --with-xsl \
    --with-pgsql \
    --with-pdo-mysql=/usr \
    --with-pdo-pgsql \
    --with-mysqli \
    --with-pdo-dblib \
    --with-ldap \
    --with-ldap-sasl \
    --enable-shmop \
    --enable-sysvsem \
    --enable-sysvshm \
    --enable-sysvmsg \
    --with-tidy \
    --with-expat \
    --with-enchant \
    --with-imap=/usr/local/imap-2007f \
    --with-imap-ssl=/usr/include/openssl \
    --with-kerberos=/usr/include/krb5 \
    --with-sodium=/usr \
    --with-zip \
    --enable-opcache \
    --with-pear \
    --with-ffi
```
## Continuous Delivery
* BitBucket Pipelines

## API
* `Apigility` is now `Laminas API Tools`
  * https://api-tools.getlaminas.org/

# Q & A
* Q: Can you modify the method signature of a class that implements an interface?
* A: For the most part: NO!  However ... https://wiki.php.net/rfc/covariant-returns-and-contravariant-parameters
