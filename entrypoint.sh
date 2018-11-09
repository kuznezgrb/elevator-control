#!/bin/bash -e

echo 'Starting php7.2-fpm';
/usr/sbin/service php7.2-fpm start
echo 'Starting nginx';
/usr/sbin/service nginx start
tail -f /dev/null
