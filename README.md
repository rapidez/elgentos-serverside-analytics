# Rapidez Elgentos Serverside Analytics

This package installs [Laravel GAMP](https://github.com/irazasyed/laravel-gamp) which uses the [Google Analytics Measurement Protocol library](https://github.com/theiconic/php-ga-measurement-protocol) to send pageviews to Google Analytics. On top of that it sends the generated client / user id to Magento when the credentials in the checkout are saved, so the [Server Side Analytics](https://github.com/elgentos/magento2-serversideanalytics) package from Elgentos has the same id so the pageviews and the order can ben linked together.

## Requirements

The [forked Server Side Analytics](https://github.com/jbclaudio/magento2-serversideanalytics) package installed and configured within your Magento 2 installation:
```
composer config repositories.elgentos/serversideanalytics2 git https://github.com/jbclaudio/magento2-serversideanalytics.git
composer require elgentos/serversideanalytics2:dev-master
```

## Installation

```
composer require rapidez/elgentos-serverside-analytics
```

## Configuration

Add your UA code from Google in your `.env` with `GA_ID=` or publish the config file and configure it as you like:

```
php artisan vendor:publish --provider="Irazasyed\LaravelGAMP\LaravelGAMPServiceProvider"
```
