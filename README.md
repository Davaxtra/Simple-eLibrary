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

Generate application key

```
php artisan key:generate
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
username : admin
password : superadmin

Guest
username : tamu
password : tamu01
```

## Screenshot
### Login page
![Screenshot (115)](https://github.com/Davaxtra/Simple-eLibrary/assets/141833564/7956bec8-09d6-49d9-a6ab-2e686714a045)

### Home page
![Screenshot (116)](https://github.com/Davaxtra/Simple-eLibrary/assets/141833564/cd08342a-659c-4b3f-b4f9-16bb78e829a3)

### Book index
![Screenshot (118)](https://github.com/Davaxtra/Simple-eLibrary/assets/141833564/ff983ace-e423-4142-8905-2298b6643437)

### Create book
![Screenshot (120)](https://github.com/Davaxtra/Simple-eLibrary/assets/141833564/c2c4919a-a69c-4d71-8e91-5de9118f334d)

### Edit book
![Screenshot (122)](https://github.com/Davaxtra/Simple-eLibrary/assets/141833564/b32ceb3a-12a8-46a6-a271-ef0950fd2f3c)

### Detail book
![Screenshot (121)](https://github.com/Davaxtra/Simple-eLibrary/assets/141833564/b06edd52-f1c0-4518-b3d5-2f784e5c5c59)
