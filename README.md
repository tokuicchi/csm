## 立ち上げ
$ docker-compose up -d --build

## appコンテナに入る
$ docker compose exec app bash

## Laravelプロジェクトの作成
$ composer create-project --prefer-dist "laravel/laravel=9.*" .

## Laravel確認
$ php artisan -v

localhost:8081 にアクセス