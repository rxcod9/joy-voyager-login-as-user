# Joy VoyagerLoginAsUser

This [Laravel](https://laravel.com/)/[Voyager](https://voyager.devdojo.com/) module adds VoyagerLoginAsUser support to Voyager.

By 🐼 [Ramakant Gangwar](https://github.com/rxcod9).

[![Screenshot](https://raw.githubusercontent.com/rxcod9/joy-voyager-login-as-user/main/cover.jpg)](https://joy-voyager.kodmonk.com/)

[![Latest Version](https://img.shields.io/github/v/release/rxcod9/joy-voyager-login-as-user?style=flat-square)](https://github.com/rxcod9/joy-voyager-login-as-user/releases)
![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/rxcod9/joy-voyager-login-as-user/run-tests.yml?branch=main&label=tests)
[![Total Downloads](https://img.shields.io/packagist/dt/joy/voyager-login-as-user.svg?style=flat-square)](https://packagist.org/packages/joy/voyager-login-as-user)

---

## Prerequisites

*   Composer Installed
*   [Install Laravel](https://laravel.com/docs/installation)
*   [Install Voyager](https://github.com/the-control-group/voyager)

---

## Installation

```bash
# 1. Require this Package in your fresh Laravel/Voyager project
composer require joy/voyager-login-as-user

# 2. Publish
php artisan vendor:publish --provider="Joy\VoyagerLoginAsUser\VoyagerLoginAsUserServiceProvider" --force

# 3. Add the trait Lab404\Impersonate\Models\Impersonate to your User model.
```

---


## Working Example

You can try laravel demo here [https://joy-voyager.kodmonk.com/admin/users](https://joy-voyager.kodmonk.com/admin/users).

## Documentation

Find yourself stuck using the package? Found a bug? Do you have general questions or suggestions for improving the joy voyager-login-as-user? Feel free to [create an issue on GitHub](https://github.com/rxcod9/joy-voyager-login-as-user/issues), we'll try to address it as soon as possible.

If you've found a bug regarding security please mail [gangwar.ramakant@gmail.com](mailto:gangwar.ramakant@gmail.com) instead of using the issue tracker.

Also for laravel package `404labfr/laravel-impersonate` read following documentation https://github.com/404labfr/laravel-impersonate#simple-usage

## Testing

You can run the tests with:

```bash
vendor/bin/phpunit
```

## Upgrading

Please see [UPGRADING](UPGRADING.md) for details.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email [gangwar.ramakant@gmail.com](mailto:gangwar.ramakant@gmail.com) instead of using the issue tracker.

## Credits

- [Ramakant Gangwar](https://github.com/rxcod9)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
