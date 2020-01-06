# Laravel-locale-switcher
Easy and fast locale switching package for your laravel app. 

## Instalation with composer
"bab55z/laravel-locale-switcher": "v0.1-beta.1",

## Publish config file
php artisan vendor:publish --provider="Bab55z\LaravelLocaleSwitcher\LaravelLocaleSwitcherServiceProvider" --tag="config"

## Available settings
**status** : true enables locale switching management

**languages** : supported locales by your app

**redirect-to** : redirect page after locale switched successfully, leave blank to redirect user to the previous page

