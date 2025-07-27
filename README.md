# 確認テストPiGLy

## 環境構築

### Docker ビルド

- 1.git clone git@github.com:git@github.com:Estra-Coachtech/test3.git
- 2.cd test3
- 3.DockerDesktopアプリを立ち上げる
- 4.docker-compose up -d --build

### Laravel 環境構築

- 1.docker-compose exec php bash
- 2.composer install
- 3.cp .env.example .env

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

- php artisan key:generate
- php artisan migrate
- php artisan db:seed

## 使用技術（実行環境）

- php:7.4.9
- laravel:8.83.29
- mysql:8.0.26

## ER図

![ER図](ER.png)

## URL

- 開発環境:http://localhost/weight_logs
- phpMyAdmin:http://localhost:8080/

## ログイン

ダミーデータをユーザー認証で認識させることができていないのでダミーデータではログインできない状態になっています

### ダミーデータ

- email:test@example.com
- password:coachtech1106

### ログイン可能なデータ

- email:test@example.com
- password:password
