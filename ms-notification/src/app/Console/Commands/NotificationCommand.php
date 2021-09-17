<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use App\Brokers\Interfaces\BrokerInterface;
use App\Services\Interfaces\NotificationServiceInterface;

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

    public function __construct(
        private NotificationServiceInterface $notificationService,
        private BrokerInterface $messageBroker
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) {
            echo "Printing: " . $msg->body . "\n";
            $this->notificationService->send($msg->body);
        };

        $this->messageBroker->receiveFromQueue('notification_queue', $callback);
        $this->messageBroker->wait();
    }
}
