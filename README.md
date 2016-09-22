Run:

    docker-compose exec php composer install
    docker-compose exec php bin/console

Setup:

    docker-compose exec php composer create-project symfony/framework-standard-edition .
    docker-compose exec php composer require php-amqplib/rabbitmq-bundle
