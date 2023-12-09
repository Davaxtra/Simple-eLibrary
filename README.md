# Simple E-Libary
> This is a simple Catalog App.

## General Information
- This is built on Laravel Framework 9.x.
- This was built for the purpose of the final project.

# Installation
Cloning the repository

```
git clone https://github.com/Davaxtra/Simple-elib
```

Change directory

```
cd simple-elib
```

Then do a composer install

```
composer install
```

Crate a environment file

```
cp .env.example .env
```

Edit `.env` file with appropriate credential for your database server. Such as edit these parameter(`DB_USERNAME`, `DB_PASSWORD`, `DB_DATABASE`).


Do a database migration

```
php artisan migrate
```

Generate application key

```
php artisan generate:key
```

Install Js Dependencies

```
npm install && npm run dev
```

Migrate the migration and seed the database

```
php artisan migrate:fresh --seed
```

Start a server

```
php artisan serve
```

Credentials
```
Admin
username : Admin
password : superadmin

Guest
username : tamu
password : tamu01
```

## Screenshot