# Log and debug HTTP requests within your Laravel application.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dniccum/laravel-request-logs.svg?style=flat-square)](https://packagist.org/packages/dniccum/laravel-request-logs)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/dniccum/laravel-request-logs/run-tests?label=tests)](https://github.com/dniccum/laravel-request-logs/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/dniccum/laravel-request-logs/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/dniccum/laravel-request-logs/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/dniccum/laravel-request-logs.svg?style=flat-square)](https://packagist.org/packages/dniccum/laravel-request-logs)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-request-logs.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-request-logs)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require dniccum/laravel-request-logs
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-request-logs-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-request-logs-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-request-logs-views"
```

## Usage

```php
$laravelRequestLogs = new Dniccum\LaravelRequestLogs();
echo $laravelRequestLogs->echoPhrase('Hello, Dniccum!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Doug Niccum](https://github.com/dniccum)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
