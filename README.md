## Online Support System

```
git clone git@github.com:AnuruddhaBandara/online-support-system.git
```

```
cd online-support-system
```

```
composer install

cp .env.example .env
php artisan key:generate
```

Update .env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

checkout to dev branch and get a pull

```
php artisan migrate

npm install && npm run dev

php artisan serve
```
