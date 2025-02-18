# Send-Email-using-Queue
In this example, we will create one mail class and create a job class. you can send test mail using a queue. just follow the below step and make it done this example:

Sometimes, you see some processes take time to load like email send, payment gateway, etc. When you send an email for verification or send an invoice then it loads time to send mail because it is services. If you don't want to wait for the user to send an email or other process on loading server-side process then you can use a queue. because it's very fast and visitors will happy to see loading time.

```bash
git clone https://github.com/ruhulamin63/Send-Email-using-Queue.git
```

```bash
cp .env.example .env
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-db-name
DB_USERNAME=root
DB_PASSWORD=
```

```bash
composer update
```

```bash
php artisan migrate
```

### Public Access Route
```bash
http://127.0.0.1:8000
```

### Create Mail Class with Configuration & Queue Job

```bash
php artisan make:mail SendEmailTest

php artisan make:mail SendEmailTest

php artisan queue:work
```