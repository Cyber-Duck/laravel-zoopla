# laravel-zoopla
Laravel 5 package for the Zoopla API

## Install

Simply add the following line to your `composer.json` and run install/update:

    "cyberduck/laravel-zoopla": "dev-master"

## Configuration

Publish the package config files to configure your api keys:

    php artisan vendor:publish

You will also need to add the service provider and optionally the facade alias to your `app/config/app.php`:

```php
'providers' => array(
  'Cyberduck\LaravelZoopla\LaravelZooplaServiceProvider'
)

'aliases' => array(
  'Zoopla' => 'Cyberduck\LaravelZoopla\Facades\Zoopla'
),
```

### Usage

*Please see the [Zoopla API](http://developer.zoopla.com/docs) for full documentation.*

You can either use the facade or inject the Zoopla class. The package provides a camel case interface to all the existing api methods

```php
Zoopla::PropertyListings(['postcode' => 'WD6 3EP'])
```