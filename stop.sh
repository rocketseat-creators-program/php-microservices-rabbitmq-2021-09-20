#!/bin/bash

cd ms-transaction
docker-compose down

cd ../ms-notification
docker-compose down

cd ../ms-queues
docker-compose down