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

Update .env with database server and mail server

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

<<<<<<< HEAD
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```
=======
checkout to dev branch and get a pull
>>>>>>> 1f0ecbf (update readme file)

```
php artisan migrate
php artisan db:seed --class=UsersTableSeeder

npm install && npm run dev

php artisan serve
```

Please use bellow credentials to login as a Support Ticket Agent

```
email: anuruddha@testmail.com
password: password

email: nisala@testmail.com
password: password

email: kasun@testmail.com
password: password

email: akila@testmail.com
password: password
```
