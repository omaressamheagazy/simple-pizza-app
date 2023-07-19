
# Simple pizza application

A simple pizza application designed with the highest security standards
## Features

- Easy ordering for pizzas
- Secure payment using Stripe
- User managment 


## Application Stack
* Laravel 
* MySQl
* tailwind 
* filament 


## Run Locally

Clone the project

```bash
  git clone https://github.com/omaressamheagazy/simple_secured_app.git
```

Go to the project directory

```bash
  cd my-project
```

Install dependencies

```bash
  npm install
  composer install
```
Generate app key

```bash
  php artisan key:generate
```
create the database tables and entries

```bash
  php artisan migrate
```

Start the server

```bash
  npm run start
  php artisan serve
```


## Environment Variables

To run this project, you will need to add stirpe keys, and mailtrap keys
* change .env.example to env, and fill the requried keys
## Usage/Examples
#### Normal user
* Email: user@gmail.com
* password: password
#### Admin
* Email: admin@gmail.com
* password: password






