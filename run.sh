#!/bin/bash

cd ms-transaction
docker-compose up -d

cd ../ms-notification
docker-compose up -d

cd ../ms-queues
docker-compose up -d