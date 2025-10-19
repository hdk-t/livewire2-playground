# livewire2-playground
Laravel Livewire2.x の検証用リポジトリ

## ローカル環境構築
### .env をコピー
    cp -p ./src/.env.example ./src/.env

### コンテナを起動
    docker-compose up -d

### ライブラリをインストール
    docker exec -it livewire2-playground_app_1 composer install

### APP_KEY を生成
    docker exec -it livewire2-playground_app_1 php artisan key:generate

### 権限を変更
    docker exec -it livewire2-playground_app_1 "chmod +x ./public/storage/photos"

### リンクを作成
    docker exec -it livewire2-playground_app_1 php artisan storage:link

### トップページにアクセス
http://localhost:8080
