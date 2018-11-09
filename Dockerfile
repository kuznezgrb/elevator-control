FROM ubuntu:16.04

RUN apt-get update && \
    apt-get upgrade -y --no-install-recommends --no-install-suggests && \
    apt-get install software-properties-common python-software-properties -y --no-install-recommends --no-install-suggests && \
    LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y && \
    apt-get update && \
    apt-get install php7.2-fpm php7.2-cli -y --no-install-recommends --no-install-suggests

RUN apt-get update && \
    apt-get install -y --no-install-recommends --no-install-suggests \
    nginx \
    ca-certificates \
    gettext \
    mc \
    libmcrypt-dev  \
    libicu-dev \
    libcurl4-openssl-dev \
    mysql-client \
    libldap2-dev \
    libfreetype6-dev \
    libfreetype6 \
    libpng12-dev \
    curl

RUN apt-get update && \
    apt-get install -y --no-install-recommends --no-install-suggests \
    php-pear \
    php7.2-mongodb \
    php7.2-curl \
    php7.2-intl \
    php7.2-soap \
    php7.2-xml \
    php-mcrypt \
    php7.2-bcmath \
    php7.2-mysql \
    php7.2-mysqli \
    php7.2-amqp \
    php7.2-mbstring \
    php7.2-ldap \
    php7.2-zip \
    php7.2-iconv \
    php7.2-pdo \
    php7.2-json \
    php7.2-simplexml \
    php7.2-xmlrpc \
    php7.2-gmp \
    php7.2-fileinfo \
    php7.2-sockets \
    php7.2-ldap \
    php7.2-gd \
    php7.2-xdebug && \
    echo "extension=apcu.so" | tee -a /etc/php/7.2/mods-available/cache.ini

RUN apt-get install -y mcrypt  libmcrypt-dev

RUN apt-get install -y --no-install-recommends --no-install-suggests \
    git-core

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Install node.js
RUN apt-get install --yes curl
RUN curl --silent --location https://deb.nodesource.com/setup_11.x |  bash -
RUN apt-get install --yes nodejs
RUN apt-get install --yes build-essential
RUN npm cache clean -f && npm install -g n && n stable && npm install cross-env

RUN cp /usr/share/zoneinfo/Europe/Moscow /etc/localtime

RUN ln -sf /dev/stdout /var/log/nginx/access.log \
	&& ln -sf /dev/stderr /var/log/nginx/error.log \
	&& ln -sf /dev/stderr /var/log/php7.2-fpm.log

RUN  apt-get install -y \
        php-mcrypt

RUN apt-get install -y dos2unix # Installs dos2unix Linux
RUN mkdir -p /run/php && touch /run/php/php7.2-fpm.sock && touch /run/php/php7.2-fpm.pid

RUN rm -f /etc/nginx/sites-enabled/*
COPY ./config/default.conf /etc/nginx/conf.d/default.conf
COPY ./config/nginx.conf /etc/nginx/nginx.conf

COPY ./config/php.ini /etc/php/7.2/fpm/php.ini

COPY ./www/ /var/www/
COPY entrypoint.sh /entrypoint.sh
WORKDIR /var/www/
RUN chmod 755 /entrypoint.sh
RUN find /  -name "*.sh" -exec dos2unix {} \; # recursively removes windows related stuff

EXPOSE 80
CMD ["/entrypoint.sh"]