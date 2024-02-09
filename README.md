## 立ち上げ
$ docker-compose up -d --build

$ sudo lsof -i:3306
$ sudo kill {pid}

## appコンテナに入る
$ docker compose exec app bash

## Laravelプロジェクトの作成
$ docker compose exec app composer create-project --prefer-dist "laravel/laravel=9.*" .

## Laravel確認
$ docker compose exec app php artisan -v

localhost:8081 にアクセス

## マイグレ
$ docker compose exec app php artisan migrate

## Laravel Sail
$ cd src
$ ./vendor/bin/sail up

## Laravel ui
$ docker compose exec app /bin/bash
$ composer require laravel/ui

$ php artisan ui bootstrap --auth
$ php artisan migrate

$ npm install
$ npm run dev

## composer 不備
$ composer require --update-with-dependencies --prefer-dist aws/aws-sdk-php:3.275.0
$ composer require ellaisys/aws-cognito