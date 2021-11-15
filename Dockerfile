FROM php:8.0-apache
LABEL Name=exodus Version=0.0.1
WORKDIR /var/www/html

COPY exodus .

RUN apt-get -y update && apt-get install -y fortunes
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
CMD ["sh", "-c", "/usr/games/fortune -a | cowsay"]
