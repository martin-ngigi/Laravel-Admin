## Laravel-Admin

- [Install Laravel on Mac and Windows OS
](https://www.dbestech.com/tutorials/how-to-install-laravel-on-mac-os)
- [Build Laravel Admin Panel - Best Backend](https://www.dbestech.com/tutorials/build-laravel-admin-panel-best-backend)
- [Youtube Tutorial](https://www.youtube.com/watch?v=sybdQGh6nAc&t=193s)
- [Problems and solutions](https://www.dbestech.com/tutorials/laravel-admin-panel-config-problems-and-solutions)

- reate a new Laravel project via the Composer create-project command:
```
composer create-project laravel/laravel Laravel-Admin
```

- to start laravel:
```
php artisan key:generate
php artisan serve
```

- install laravel-admin panel using composer.
```
composer require encore/laravel-admin
```

- publish assets and config：
```
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
```

- At last run following command to finish install:
```
php artisan admin:install
```
- Open http://localhost/admin/ in browser,use username admin and password admin to login.

- Create model Article and ArticleType
```
php artisan make:model Article
php artisan make:model ArticleType
```

- For these two models now we will create two controllers:
```
php artisan admin:make ArticleController --model='App\Models\Article'
php artisan admin:make ArticleTypeController --model='App\Models\ArticleType'
```

- to create two migration files.
```
php artisan make:migration create_articles_table
php artisan make:migration create_article_types_table
```

- migrate:
```
php artisan migrate
```