# PHP-III Mar 2021

## TODO
* Rework the example that implements `Serializable`

## Homework
* For Wed 16 Mar 2021
  * Get VM up and running
  * OPTIONAL: update phpMyAdmin
     * https://github.com/dbierer/php-ii-mar-2021/blob/main/tools/phpmyadmin_510.sh
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

