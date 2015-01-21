# laravel-zoopla
Laravel package for the Zoopla API

## Install

Simply add the following line to your `composer.json` and run install/update:

    "cyberduck/laravel-zoopla": "dev-master"

## Configuration

You should keep your Zoopla api key in a dot file. For more information read [Protecting Sensitive Configuration](http://laravel.com/docs/configuration#protecting-sensitive-configuration).

```php
<?php
return array(
  'laravel-zoopla' => array(
    'api_key' => '<YOUR_API_KEY>'
    'endpoint' => 'http://api.zoopla.co.uk/api/v1/'
  )
);
```

Alternatively you can choose to publish the package config files to configure your api keys there instead:

    php artisan config:publish cyberduck/laravel-zoopla

You will also need to add the service provider and the facade alias to your `app/config/app.php`:

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

The package provides a camel case interface to all the existing api methods

```php
Zoopla::PropertyListings(['postcode' => 'n154sh'])
```