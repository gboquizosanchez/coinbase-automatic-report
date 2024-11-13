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
`COINBASE_API_KEY` and `COINBASE_SECRET_API_KEY` must be set. Additionally, setting `COINBASE_USERNAME` is recommended for personalized emails.

After configuring these settings, fill in the `MAIL` variables. Alternatively, set `MAIL_MAILER` to `log` for local testing.

Set `MAIL_FROM_ADDRESS` and `MAIL_FROM_NAME` with your email and name, and `MAIL_TO_ADDRESS` with the recipient's email.

Finally, set `MAIL_SCHEDULE_AT` to the desired time for the daily email report.
If everything is configured correctly, run `php artisan schedule:run` to send the email at the specified time.

That's it! Enjoy! 😉

## Working with ⚙️
![Composer](https://img.shields.io/badge/composer.lock-commited-blue)
### PHP dependencies 📦
- Laravel Framework [![Latest Stable Version](https://img.shields.io/badge/stable-v11.31.0-blue)](https://packagist.org/packages/laravel/framework)
- Laravel Tinker [![Latest Stable Version](https://img.shields.io/badge/stable-v2.10.0-blue)](https://packagist.org/packages/laravel/tinker)
- Neto737 Coinbase [![Latest Stable Version](https://img.shields.io/badge/dev-stable-latest)](https://packagist.org/packages/neto737/coinbase)

#### Develop dependencies 🔧
- Fakerphp Faker [![Latest Stable Version](https://img.shields.io/badge/stable-v1.24.0-blue)](https://packagist.org/packages/fakerphp/faker)
- Hermes Dependencies [![Latest Stable Version](https://img.shields.io/badge/stable-1.1.1-blue)](https://packagist.org/packages/hermes/dependencies)
- Larastan Larastan [![Latest Stable Version](https://img.shields.io/badge/stable-v2.9.0-blue)](https://packagist.org/packages/larastan/larastan)
- Laravel Pail [![Latest Stable Version](https://img.shields.io/badge/stable-v1.2.1-blue)](https://packagist.org/packages/laravel/pail)
- Laravel Pint [![Latest Stable Version](https://img.shields.io/badge/stable-v1.18.1-blue)](https://packagist.org/packages/laravel/pint)
- Laravel Sail [![Latest Stable Version](https://img.shields.io/badge/stable-v1.38.0-blue)](https://packagist.org/packages/laravel/sail)
- Mockery Mockery [![Latest Stable Version](https://img.shields.io/badge/stable-1.6.12-blue)](https://packagist.org/packages/mockery/mockery)
- Nunomaduro Collision [![Latest Stable Version](https://img.shields.io/badge/stable-v8.5.0-blue)](https://packagist.org/packages/nunomaduro/collision)
- Pestphp Pest [![Latest Stable Version](https://img.shields.io/badge/stable-v3.5.1-blue)](https://packagist.org/packages/pestphp/pest)
- Phpunit Phpunit [![Latest Stable Version](https://img.shields.io/badge/stable-11.4.3-blue)](https://packagist.org/packages/phpunit/phpunit)
- Roave Security Advisories [![Latest Stable Version](https://img.shields.io/badge/latest-main-latest)](https://packagist.org/packages/roave/security-advisories)

## Author ✒️

This tool has been realized with ❤ by [Germán Boquizo Sánchez](mailto:germanboquizosanchez@gmail.com)
