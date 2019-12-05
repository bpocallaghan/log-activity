# Log Activity

Log activities in your Laravel app.
This package is being used in the [Admin Starter Project](https://github.com/bpocallaghan/laravel-admin-starter)

## Installation
You can install the package via composer:

```bash
composer require bpocallaghan/log-activity
```

The package will automatically register itself.

You can publish the migration with:

```bash
php artisan vendor:publish --provider="Bpocallaghan\LogActivity\LogActivityServiceProvider" --tag="migrations"
```

After publishing the migration you can create the log_activities table by running the migrations:

```bash
php artisan migrate
```
