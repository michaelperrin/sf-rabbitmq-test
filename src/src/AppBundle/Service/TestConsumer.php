<?php

namespace AppBundle\Service;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Psr\Log\LoggerInterface;

class TestConsumer implements ConsumerInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(AMQPMessage $msg)
    {
        $this->logger->error('Test !!!');
    }
}
