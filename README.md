# VkCaller

Запуск контейнеров
```shell
docker-compose -f docker/docker-compose.yml up -d --build
```

Вход в контейнер
```shell
docker-compose -f docker/docker-compose.yml exec php bash
```

Установка зависимостей и миграций в контейнере
```shell
composer install
php bin/console d:m:m
```

Запуск консюмера
```shell
bin/console rabbitmq:consumer call -vvv
```