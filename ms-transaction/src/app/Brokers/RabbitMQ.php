<?php

namespace App\Brokers;

use App\Brokers\Interfaces\BrokerInterface;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQ implements BrokerInterface
{
    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST'),
            env('RABBITMQ_PORT'),
            env('RABBITMQ_USER'),
            env('RABBITMQ_PASS')
        );
        $this->channel = $this->connection->channel();
    }

    public function sendToQueue(string $queue, array $payload): void
    {
        $this->channel->queue_declare($queue, false, false, false, false);

        $msg = new AMQPMessage(json_encode($payload));
        $this->channel->basic_publish($msg, '', $queue);
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
