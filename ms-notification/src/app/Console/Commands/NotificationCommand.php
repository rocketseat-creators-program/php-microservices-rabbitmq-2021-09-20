<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class NotificationCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Consume all notification in the queue";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $connection = new AMQPStreamConnection('172.26.0.1', 5672, 'admin', 'admin');
        $channel = $connection->channel();

        $channel->queue_declare('notification_queue2', false, false, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) {
            echo "Printing: " . $msg;
        };

        $channel->basic_consume('notification_queue2', '', false, true, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}
