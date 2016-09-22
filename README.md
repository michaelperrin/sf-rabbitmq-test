# Test of Symfony / RabbitMQ / Docker

A very simple project to reproduce an issue with Symfony and RabbitMQ. **[EDIT] Problem solved and commited in this project.**

Related StackOverflow question: http://stackoverflow.com/questions/39640489/error-reading-data-while-executing-a-rabbitmq-consumer-in-symfony

This project defines 2 containers:

* One for PHP 7 (with necessary extensions and Composer)
* One for RabbitMQ

The `RabbitMqBundle` is installed and configured.


## Setup

Clone project first and execute these commands:

    docker-compose build
    docker-compose up -d
    docker-compose exec php composer install

Execute `test` consumer:

    docker-compose exec php bin/console rabbitmq:consumer -w test --verbose

You should get the following message, showing the problem:

> [PhpAmqpLib\Exception\AMQPIOException]                      
> Error reading data. Received 0 instead of expected 7 bytes  


## Solution

The problem was really simple, solution was to change this parameter:

    old_sound_rabbit_mq:
        connections:
            default:
                # ...
                use_socket: true

to:

    old_sound_rabbit_mq:
        connections:
            default:
                use_socket: false

Note that `false` is the default value.
