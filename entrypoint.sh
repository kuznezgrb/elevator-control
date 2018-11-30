#!/bin/bash -e

echo 'Starting php7.2-fpm';
/usr/sbin/service php7.2-fpm start
echo 'Starting nginx';
/usr/sbin/service nginx start

npm install forever -g
forever start /var/www/serverNodeJs/app.js

tail -f /dev/null
