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

### Keep Laravel Queue System Running on Server:
As we know we must need to keep running `php artisan work` command on the terminal because then and then queue will work. so in server, you must have to keep running using Supervisor. A supervisor is a process monitor for the Linux operating system, and will automatically restart your queue:work processes if they fail.

So let's install Supervisor using bellow command:

#### Install Supervisor:
```bash
sudo apt-get install supervisor
```

Next, we need to configuration file on supervisor as below following path, you can set project path, user and output file location as well:

#### /etc/supervisor/conf.d/laravel-worker.conf
```bash
[program:laravel-worker]

process_name=%(program_name)s_%(process_num)02d

command=php /home/forge/app.com/artisan queue:work sqs --sleep=3 --tries=3 --max-time=3600

autostart=true

autorestart=true

stopasgroup=true

killasgroup=true

user=forge

numprocs=8

redirect_stderr=true

stdout_logfile=/home/forge/app.com/worker.log

stopwaitsecs=3600
```

Next, we will start supervisor with below commands:
```bash
sudo supervisorctl reread

sudo supervisorctl update

sudo supervisorctl start laravel-worker:*
```
Now you can check it, from your end.
