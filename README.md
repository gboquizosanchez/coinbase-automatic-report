# Coinbase
![Coinbase Automatic Report](resources/images/report.png)

## Automatic report

Once is deployed, send an automatic report with accounts status of your criptos.

## Starting 🚀
It is necessary an API key from Coinbase. You can create it in [this url](https://www.coinbase.com/settings/api).

### Prerequisites 📋
- [Composer](https://getcomposer.org/).
- PHP version 8.3 or higher.

## Running 🛠️
`COINBASE_API_KEY` and `COINBASE_SECRET_API_KEY` must be filled. And `COINBASE_USERNAME` is recommendable if you want mail to say your name! 😀️

Once those settings are set, you have to fill `MAIL` variables too. Or just put `MAIL_MAILER` into `log` if you want to try this project in local.

Only one setting more! `MAIL_SCHEDULE_AT` is the hour you want to execute your daily mail report.
If all is set properly has to run: `php artisan schedule:run` and mail will be sent to you if hour is set properly.

And that's all! Enjoy! 😉

## Working with ⚙️
![Composer](https://img.shields.io/badge/composer.lock-commited-blue)
### PHP dependencies 📦
- Laravel Framework [![Latest Stable Version](https://img.shields.io/badge/stable-v11.30.0-blue)](https://packagist.org/packages/laravel/framework)
- Laravel Tinker [![Latest Stable Version](https://img.shields.io/badge/stable-v2.10.0-blue)](https://packagist.org/packages/laravel/tinker)
- Neto737 Coinbase [![Latest Stable Version](https://img.shields.io/badge/dev-stable-latest)](https://packagist.org/packages/neto737/coinbase)

#### Develop dependencies 🔧
- Fakerphp Faker [![Latest Stable Version](https://img.shields.io/badge/stable-v1.23.1-blue)](https://packagist.org/packages/fakerphp/faker)
- Friendsofphp Php Cs Fixer [![Latest Stable Version](https://img.shields.io/badge/stable-v3.64.0-blue)](https://packagist.org/packages/friendsofphp/php-cs-fixer)
- Hermes Dependencies [![Latest Stable Version](https://img.shields.io/badge/stable-1.1.1-blue)](https://packagist.org/packages/hermes/dependencies)
- Larastan Larastan [![Latest Stable Version](https://img.shields.io/badge/stable-v2.9.0-blue)](https://packagist.org/packages/larastan/larastan)
- Laravel Pail [![Latest Stable Version](https://img.shields.io/badge/stable-v1.2.0-blue)](https://packagist.org/packages/laravel/pail)
- Laravel Pint [![Latest Stable Version](https://img.shields.io/badge/stable-v1.18.1-blue)](https://packagist.org/packages/laravel/pint)
- Laravel Sail [![Latest Stable Version](https://img.shields.io/badge/stable-v1.37.1-blue)](https://packagist.org/packages/laravel/sail)
- Mockery Mockery [![Latest Stable Version](https://img.shields.io/badge/stable-1.6.12-blue)](https://packagist.org/packages/mockery/mockery)
- Nunomaduro Collision [![Latest Stable Version](https://img.shields.io/badge/stable-v8.5.0-blue)](https://packagist.org/packages/nunomaduro/collision)
- Pestphp Pest [![Latest Stable Version](https://img.shields.io/badge/stable-v3.5.1-blue)](https://packagist.org/packages/pestphp/pest)
- Phpunit Phpunit [![Latest Stable Version](https://img.shields.io/badge/stable-11.4.3-blue)](https://packagist.org/packages/phpunit/phpunit)
- Roave Security Advisories [![Latest Stable Version](https://img.shields.io/badge/latest-main-latest)](https://packagist.org/packages/roave/security-advisories)

## Author ✒️

This tool has been realized with ❤ by [Germán Boquizo Sánchez](mailto:germanboquizosanchez@gmail.com)
