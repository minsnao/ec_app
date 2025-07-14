# ec_app

# アプリケーション名
フリーマーケットサイト

## 環境構築## 環境構築
-リポジトリクローン
git clone git@github.com:minsnao/ec_app.git

-プロジェクトをカレントディレクトリに設定
cd ec-app/

-ビルド
docker-compose up -d --build

-コンテナ内でコンポーザーインストール
composer install

-.envコピー
cp .env.example .env

-.envに権限を与えmysqlに接続する、書き換え後権限を戻す
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

-コンテナ内でアプリケーションキー作成
php artisan key:generate

-表示のために権限付与
sudo chmod -R 777 src/*

-migrationとseederをそれぞれ実行
php artisan migrate --seed

## 使用技術(実行環境)
Laravel:8.83.29
PHP:7.4.9 
nginx:1.21.1
mysql:8.0.26
Docker:28.0.4

## ER図
ー

## URL
開発環境 : http://localhost/

phpMyadmin : http://localhost:8080/