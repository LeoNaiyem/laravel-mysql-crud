=========================================
    important commands for CRUD operations
=========================================

1. php artisan make:model Service -mcr (Service= model name, m=migration, cr=resource controller)
2. php artisan migrate (run migration files -in this case it will create new table)
3. php artisan make:view services.index(crate view page in the subfolder in this case it will      create index.blade.php in the services folder)
4. php artisan storage:link

============================================
    Commands after clone form Github
============================================

1. .env.example .env (copy files form .env.example to .env)
    ->setup database in .env file
2. composer install (install all dependencies)
3. php artisan key:generate (generate all keys)