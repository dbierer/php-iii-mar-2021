# PHP-III Mar 2021

## TODO
* Rework the example that implements `Serializable`
* Q: What is this syntax called? `[$obj, 'method']`?
* Q: Can you provide a practical example using `SplObjectStorage`?

## Homework
* For Mon 22 Mar 2021
  * Lab: New Functions
    * Installing a Custom Extension
      * change to this directory: `/home/vagrant/Zend/workspaces/DefaultWorkspace/php3/src/ModAdvancedTechniques/Extensions/TelemetryExtension`
      * Modify `Makefile`:
        * Change this: `INIT_DIR` to `/etc/php/7.4/cli/conf.d`
        * Make sure all the directives, starting with `all:` are on their own line
        * Arguments should be on subsequent lines with at least a single tab indent
      * If you get this error: `make: Nothing to be done for 'all'.`
        * Make sure that `all:` is on its own line
        * Make sure arguments for `all:` are on the following line(s)
        * Arguments need to have at least a single tab indent
```
PHP Warning:  PHP Startup: Unable to load dynamic library 'telemetry.so' (tried: /usr/lib/php/20190902/telemetry.so (libphpcpp.so.2.0: cannot open shared object file: No such file or directory), /usr/lib/php/20190902/telemetry.so.so (libphpcpp.so.2.0: cannot open shared object file: No such file or directory)) in Unknown on line 0
```
  * Lab: Custom Compile PHP
    * See: https://lfphpcloud.net/articles/adventures_in_custom_compiling_php_8
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

## VM
* Update phpMyAdmin using this script:
  * https://github.com/dbierer/php-ii-mar-2021/blob/main/tools/phpmyadmin_510.sh

## Resources
* Previous class notes:
  * https://github.com/dbierer/php-class-notes/blob/master/php-iii-jan-2021.md
* Previous class repos:
  * https://github.com/dbierer/php-iii-may-2019

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
### PHP Advanced
* Quick one-off commands:
  * Look at the PHP command in `phpmyadmin_install.sh`
* If you want to create an interactive PHP CLI utility, use `readline()`
  * https://www.php.net/manual/en/function.readline.php
* Using the *php* wrapper to implement a REST server:
  * https://github.com/dbierer/php7cookbook/blob/master/source/chapter07/chap_07_simple_rest_server.php
  * See line 23: https://github.com/dbierer/php7cookbook/blob/master/source/Application/Web/Rest/Server.php
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

# Q & A
* Q: Can you modify the method signature of a class that implements an interface?
* A: For the most part: NO!  However ... https://wiki.php.net/rfc/covariant-returns-and-contravariant-parameters
