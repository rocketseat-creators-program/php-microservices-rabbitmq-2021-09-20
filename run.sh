#!/bin/bash

# Starting the containers
cd ms-transaction
docker-compose up -d

cd ../ms-notification
docker-compose up -d

cd ../ms-queues
docker-compose up -d

# ms-transaction container operations
cd ../ms-transaction
docker exec -it transaction-app cp .env.example .env
docker exec -it transaction-app composer install
docker exec -it transaction-app php artisan migrate
docker exec -it transaction-app php artisan db:seed

# ms-notification container operations
cd ../ms-notification
docker exec -it notification-app cp .env.example .env
docker exec -it notification-app composer install