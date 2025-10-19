# livewire2-playground
Laravel Livewire2.x の検証用リポジトリ

## ローカル環境構築
### .env をコピー
    cp -p ./src/.env.example ./src/.env

### コンテナを起動
    docker-compose up -d

### ライブラリをインストール
    docker exec -it livewire2-playground-app composer install

### APP_KEY を生成
    docker exec -it livewire2-playground-app php artisan key:generate

### リンクを作成
    docker exec -it livewire2-playground-app php artisan storage:link

### ディレクトリ作成
    docker exec -it livewire2-playground-app bash -c "mkdir ./storage/app/public/photos"

### トップページにアクセス
http://localhost:8080
