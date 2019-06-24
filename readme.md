# Trubar

**This package is currently being designed, developed and documented. In its current state, it is likely NOT YET fit for production.**

A Laravel alternative to WordPress + Sage way of creating websites. Everything but the HTML/CSS/JS part of the website (and business logic) can be created in the admin interface. Plugins and themes are supported.

Inspired in part by [Laravel Nova](https://nova.laravel.com) and [Wink](https://github.com/writingink/wink).

## Why?

Most web development agencies decide on using WordPress for their client work. The reason for that is simple: most people know how to use it or can learn to interface with it quickly. However, we believe the development experience of developing WordPress websites is lacking. We believe there is a better way.

This is why we have decided to build Trubar on top of Laravel Framework, a PHP framework known for being developer-friendly.

Trubar is a fork of Laravel Framework. As such, changes to the Laravel Framework will be merged with Trubar.

Most of the changes are stored within the `Trubar` folder with 3 subfolders:
- Admin
- Plugins
- Themes

Custom routes are loaded via `routes/trubar.php`. 

Everything else is Laravel as you know it, easily extensible and upgradable.

*This package is still in active development, so you might want to [watch](https://github.com/wewowweb/trubar/subscription) the repository to be notified of future changes.*

## Installation

Trubar is meant to be installed as a greenfield project.

### Minimum Requirements
Trubar minimum requirements are:
- PHP v7.1.3 or greater
- MySQL v5.7 or Postgres v9.2 or greater

### Installing from source

These are the steps needed to install Trubar from source:

**STEP 1:**
```bash
composer create-project wewowweb/trubar trubar
```
**STEP 2:**
```bash
cd trubar/
```
**STEP 3:**
```bash
cp .env.example .env
```
**STEP 4:**
```bash
composer install && npm install
```
**STEP 5:**
```bash
php artisan serve
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

We welcome the contributions to Trubar, but in order to avoid unpleasant situations, please follow these bullet point guidelines:

1. Open an issue prior to submitting a PR to discuss the proposed changes with the core development team.
2. All the PRs should be submitted into **develop** branch. PRs to master, laravel-develop and laravel-master branches will likely be rejected.

### Security

If you discover any security related issues, please email us at **hello@wewowweb.com** instead of using the issue tracker.

## Credits

- [We Wow Web](https://github.com/wewowweb)
- [Gal Jakic](https://github.com/morpheus7CS)
- [Matija Kogovsek](https://github.com/kogovsekm)
- [Miha Medven](https://github.com/aweCodeMan)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.