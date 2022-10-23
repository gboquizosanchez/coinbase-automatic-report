# Coinbase
![Coinbase Automatic Report](resources/images/report.png)

## Automatic report

Once is deployed send an automatic report with accounts status of your criptos.

## Starting 🚀
It is necessary an API key from Coinbase. You can create it in [this url](https://www.coinbase.com/settings/api).

### Prerequisites 📋
- [Composer](https://getcomposer.org/).
- PHP version 8.1.

## Running 🛠️
`COINBASE_API_KEY` and `COINBASE_SECRET_API_KEY` must be filled. And `COINBASE_USERNAME` is recommendable if you want mail say your name! 😀️

Once those settings are set, you have to fill `MAIL` variables too. Or just put `MAIL_MAILER` into `log` if you want to try this project in local.

Only one setting more! `MAIL_SCHEDULE_AT` is the hour you want to execute your daily mail report.
If all is set properly have to run: `php artisan schedule:run` and a mail will be send to you if hour is set properly.

And that's all! Enjoy! 😉

## Working with ⚙️
![Composer](https://img.shields.io/badge/composer.lock-commited-blue)
### PHP dependencies 📦
- Illuminate Mail [![Latest Stable Version](https://img.shields.io/badge/stable-v9.36.4-blue)](https://packagist.org/packages/illuminate/mail)
- Laravel Lumen Framework [![Latest Stable Version](https://img.shields.io/badge/stable-v9.1.4-blue)](https://packagist.org/packages/laravel/lumen-framework)
- Neto737 Coinbase [![Latest Stable Version](https://img.shields.io/badge/stable-v2.9.0-blue)](https://packagist.org/packages/neto737/coinbase)

#### Develop dependencies 🔧
- Fakerphp Faker [![Latest Stable Version](https://img.shields.io/badge/stable-v1.20.0-blue)](https://packagist.org/packages/fakerphp/faker)
- Laravel Sail [![Latest Stable Version](https://img.shields.io/badge/stable-v1.16.2-blue)](https://packagist.org/packages/laravel/sail)
- Mockery Mockery [![Latest Stable Version](https://img.shields.io/badge/stable-1.5.1-blue)](https://packagist.org/packages/mockery/mockery)
- Phpunit Phpunit [![Latest Stable Version](https://img.shields.io/badge/stable-9.5.25-blue)](https://packagist.org/packages/phpunit/phpunit)
- Roave Security Advisories [![Latest Stable Version](https://img.shields.io/badge/stable-latest-red)](https://packagist.org/packages/roave/security-advisories)

## Author ✒️

This tool has been realized with ❤ by [Germán Boquizo Sánchez](mailto:germanboquizosanchez@gmail.com)
