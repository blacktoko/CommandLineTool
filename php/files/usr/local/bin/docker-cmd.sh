#!/usr/bin/env sh

set -eu

if [ "$PHP_COMPOSER_INSTALL_DEV" = true ]; then
    echo "Installing dev dependencies..."
    php -d auto_prepend_file=none $(which composer) install --no-progress --prefer-dist --no-interaction --no-ansi
fi

echo "Starting php-fpm..."
exec php-fpm
