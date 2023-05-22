FROM php:8.0-cli-alpine as build

# install latest Xdebug compatible with PHP 8.0, see https://xdebug.org/docs/compat
RUN apk add \
        --no-cache \
        php8-pecl-xdebug

FROM php:8.0-cli-alpine as final
LABEL maintainer="andre.rademacher.business@googlemail.com"
COPY --from=build /usr/lib/php8/modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20200930/xdebug.so
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY --from=composer/composer:2-bin /composer /usr/local/bin/composer
USER 1000
WORKDIR /codewars/php80