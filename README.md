# LaraChat
Laravel 5.4 Chat App

### Getting Started

Clone the project repository by running the command below if you use SSH
```
git clone https://github.com/afasari/LaraChat.git
```


Run:

```
composer install
```

Duplicate `.env.example` and rename it `.env`
run:
```
php artisan key:generate
```

### Setup Pusher

Create a free Pusher account at https://pusher.com/signup then login to your dashboard and create an app. 

Set the `BROADCAST_DRIVER` in your `.env` file to **pusher**:

```
BROADCAST_DRIVER=pusher
```

Then fill in your Pusher app credentials in your `.env` file:

```
PUSHER_APP_ID=xxxxxx
PUSHER_APP_KEY=xxxxxxxxxxxxxxxxxxxx
PUSHER_APP_SECRET=xxxxxxxxxxxxxxxxxxxx
```

Also, remember to fill in the `cluster` of your Pusher app and other additional options in `config/broadcasting.php`:

```
// config/broadcasting.php

'options' => [
   'cluster' => 'eu',
   'encrypted' => true
],
```

### Database Migrations

Be sure to fill in your database details in your `.env` file before running the migrations:

```
php artisan migrate
```

And finally, start the application:

```
php artisan serve
```

and visit [http://localhost:8000/](http://localhost:8000/) to see the application in action.

### Demo
```
http://afasari.com/
```

As user :
```
http://afasari.com/login
```
```
http://afasari.com/register
```
username = batiar@afasari.com
password = Afasari11

As Admin :
```
http://afasari.com/admin
```
username = admin@afasari.com
password = password
