#!/bin/sh
set -e

if [ "$1" = 'php-fpm' ]; then
    composer install --prefer-dist --no-progress --no-interaction

	setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX var
	setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX var
fi

exec docker-php-entrypoint "$@"
