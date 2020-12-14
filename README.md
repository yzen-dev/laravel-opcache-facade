# LaravelOpcacheFacade
Laravel artisan commands for working with opcache.
## :scroll: **Installation**
The package can be installed via composer:
```
composer require yzen.dev/laravel-opcache-facade
```

## :scroll: **Usage**

Resets the contents of the opcode cache:
```
php artisan opcache:clear
```

Show configuration information about the cache:
```
php artisan opcache:config
```

Get status information about the cache:
```
php artisan opcache:status
```
