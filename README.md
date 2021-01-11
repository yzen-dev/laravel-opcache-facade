# LaravelOpcacheFacade
![Packagist Version](https://img.shields.io/packagist/v/yzen.dev/laravel-opcache-facade?color=%23007ec6&style=plastic)
![Packagist Downloads](https://img.shields.io/packagist/dm/yzen.dev/laravel-opcache-facade)
![Packagist Downloads](https://img.shields.io/packagist/dt/yzen.dev/laravel-opcache-facade)

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

### Use from code

```php
use LaravelOpcacheFacade\OpcacheFacade;

OpcacheFacade::clear();
OpcacheFacade::getConfig();
OpcacheFacade::getStatus();
```
