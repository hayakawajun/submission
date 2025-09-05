# お問い合わせフォーム
## 環境構築
Dockerビルド

 1. git clone リンク
 2. docker-compose up -d --build

※ MySQLはOSによって起動しない場合があるので、それぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

Laravel環境構築

 1. docker-compose exec php bash
 2. composer install
 3. .env.exampleファイルから .envを作成し、環境変数を変更
 4. php artisan key:generate
 5. php artisan migrate
 6. php artisan db

## 使用技術
・PHP 8.1-fpm
・Laravel 8.0
・MySQL 8.0

## URL
・開発環境：http://localhost/
・phpMyAdmin：http://localhost:8080/

## ER図
test-hayakawa ディレクトリ直下の
ER_graph.jpg を参照ください。

## 備考
実装ができなかった機能について記述いたします。
[Adminページ]
・csv形式にエクスポート
・性別の検索
・ページネーション
[認証ページ]
・フォームリクエストを使用したバリデーションメッセージ適用