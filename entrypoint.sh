#!/bin/bash

# exit immediately on error.
set -e

# You can add any pre-startup commands here

echo "Migration Started..."
php artisan migrate --force
echo "Migration Ended..."

# Start Apache in the foreground
#exec apache2-foreground

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"

###### will be added to Dockerfile start
#COPY . .
#
## Set ownership and permissions
#RUN chown -R www-data:www-data storage bootstrap/cache
#RUN chmod -R 775 storage bootstrap/cache
# Set up the entrypoint command
#COPY entrypoint.sh /usr/local/bin/
#
#RUN chmod +x /usr/local/bin/entrypoint.sh
#ENTRYPOINT ["entrypoint.sh"]
###### will be added to Dockerfile end

###### will be added to .env start
#DB_HOST=10.0.0.164
#DB_PORT=3306
#DB_DATABASE=heartbeatv2
#DB_USERNAME=atif
#DB_PASSWORD=atif
###### will be added to .env end
