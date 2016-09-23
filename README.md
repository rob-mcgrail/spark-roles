# ZiNETHQ Spark Roles

[![Laravel 5.3](https://img.shields.io/badge/Laravel-5.3-orange.svg?style=flat-square)](http://laravel.com)
[![Spark 2.0](https://img.shields.io/badge/Spark-2.0-orange.svg?style=flat-square)](https://spark.laravel.com)
[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

SparkRoles, based on [Caffeinated Shinobi](https://github.com/caffeinated/shinobi/), brings a simple and light-weight role-based permissions system to Laravel Spark's Team and User models through the following ACL structure:

- Every user can have zero or more roles.
- Every user can have zero or more permissions.
- Every team can have zero or more roles.
- Every team can have zero or more permissions.
- Roles and permissions can be shared between users and teams.
- Optionally, users and teams with a certain role (e.g. `developer`) are added to the Spark developer's array.

Permissions are then inherited to the team/user through the team/user's assigned roles.

This package is a replacement for [Caffeinated Shinobi](https://github.com/caffeinated/shinobi/) when building a project based on `Laravel/Spark`.

## Documentation
You will find user friendly documentation in the [ZiNETHQ SparkRoles Wiki](https://github.com/zinethq/sparkroles/wiki) **TO BE UPDATED**

## Quick Installation
1. Install the package through Composer.
    ```bash
    composer require zinethq/sparkroles
    ```
2. Publish the configuration into your project's configuration.
    ```bash
    php artisan vendor:publish --provider="ZiNETHQ\SparkRoles\SparkRolesServiceProvider"
    ```
3. Migrate.
    ```bash
    php artisan migrate
    ```
4. Add the service provider to your project's `config/app.php` file.
    ```php
    ZiNETHQ\SparkRoles\SparkRolesServiceProvider::class
    ```
5. **Optional:** If you'd like to dynamically assign the Spark developer array based on team/user roles then open `app\Http\kernel.php` and add the following to the `web` middleware group:
    ```php
    \ZiNETHQ\SparkRoles\Middleware\AddDevelopers::class,
    ```
    Note that this middleware can be disabled, and the slug that identified developers, can be controlled in the package config.
6. Start using team roles!


## Awesome Shinobi

[Caffeinated Shinobi](https://github.com/caffeinated/shinobi/) is an awesome tool for Laravel that adds Role Based Access Control (RBAC) to users. Go take a look!