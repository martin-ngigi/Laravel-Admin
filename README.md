## Laravel-Admin

- [Install Laravel on Mac and Windows OS
](https://www.dbestech.com/tutorials/how-to-install-laravel-on-mac-os)
- [Build Laravel Admin Panel - Best Backend](https://www.dbestech.com/tutorials/build-laravel-admin-panel-best-backend)


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


