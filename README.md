# ZiNETHQ Spark Roles

[![Laravel 5.3](https://img.shields.io/badge/Laravel-5.3-orange.svg?style=flat-square)](http://laravel.com)
[![Spark 2.0](https://img.shields.io/badge/Spark-2.0-orange.svg?style=flat-square)](https://spark.laravel.com)
[![Source](http://img.shields.io/badge/source-caffeinated/shinobi-blue.svg?style=flat-square)](https://github.com/caffeinated/shinobi)
[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

SparkTeams, based on [Caffeinated Shinobi](https://github.com/caffeinated/shinobi/), brings a simple and light-weight role-based permissions system to Laravel Spark's Team system through the following ACL structure:

- Every team can have zero or more roles.
- Every team can have zero or more permissions.

Permissions are then inherited to the team through the team's assigned roles.

This package is in early stages of development, and is based on code that follows the FIG standards PSR-1, PSR-2, and PSR-4 to ensure a high level of interoperability between shared PHP code. At the moment the package is not unit tested, but is planned to be covered later down the road.

This package should co-exist with Shinobi.

## Documentation
You will find user friendly documentation in the [ZiNETHQ SparkRoles Wiki](https://github.com/zinethq/sparkroles/wiki) **TO BE UPDATED**

## Quick Installation
1. Install the package through Composer.
    ```Bash
    composer require zinethq/sparkroles
    ```
2. Add the service provider to your project's `config/app.php` file.
    ```php
    ZiNETHQ\SparkRoles\SparkRolesServiceProvider::class
    ```
3. Publish the configuration into your project's configuration.
    ```
    php artisan vendor:publish --tag=config
    ```
4. Install the migrations into your project (Spark must be installed first).
    ```
    php artisan spark:roles:install
    ```
5. Migrate.
    ```
    php artisan migrate
    ```
6. Start using team roles!


## Awesome Shinobi

[Caffeinated Shinobi](https://github.com/caffeinated/shinobi/) is an awesome tool for Laravel that adds Role Based Access Control (RBAC) to users. Go take a look!