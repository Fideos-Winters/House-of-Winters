# IPStack Laravel Package

[![Packagist](https://img.shields.io/packagist/v/skapelapp/ipstack-laravel)](https://packagist.org/packages/skapelapp/ipstack-laravel)
[![Packagist Downloads](https://img.shields.io/packagist/dt/skapelapp/ipstack-laravel)](https://packagist.org/packages/skapelapp/ipstack-laravel)
![GitHub](https://img.shields.io/github/license/skapelapp/ipstack-laravel)

<p>The "skapelapp/ipstack-laravel" package allows you to retrieve visitor information based on their IP address using the IPStack service in your Laravel projects.</p>

- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Testing](#testing)
- [Updates](#updates)
- [License](#license)

## Requirements

- PHP: ^8.0
- Laravel: ^10.0
- IPStack API Key: ([https://ipstack.com/](https://ipstack.com/))

## Installation
You can add the package to your Laravel project using Composer:

```bash
composer require skapelapp/ipstack-laravel
```

## Configuration

<strong>1. Set your IPStack API Key in your .env file:</strong>
```bash
IPSTACK_API_KEY=your-ipstack-api-key
```

<strong>2. Run the following command to publish the configuration:</strong>
```bash
php artisan vendor:publish --tag=ipstack-laravel-config
```

<p>This command will create the config/ipstack.php file. You can check and modify your API key in this file.</p>


<strong>3. Service Provider and Alias Configuration:</strong>

<p>Add the service provider and aliases in your config/app.php file:</p>

```php
'providers' => [
    // ...
    Skapelapp\IpstackLaravel\IpstackLaravelServiceProvider::class,
],

'aliases' => [
    // ...
    'IPStack' => Skapelapp\IpstackLaravel\Facades\IPStack::class,
],
```


## Usage

<p>You can use the IPStack class to interact with the package:</p>

```php
use Skapelapp\IPStackLaravel\IPStack;

// Create an instance of the IPStack class and provide your API key
$apiKey = config('ipstack.api_key');
$ipstack = new IPStack($apiKey);

// Use the getInfo method to retrieve information
$ipInfo = $ipstack->getInfo();

// Make use of the returned information
// dd($ipInfo);
```

## Testing

<p>To run the package tests:</p>

```bash
composer test
```

## Updates

<p>To update the package, use the following command:</p>

```bash
composer update skapelapp/ipstack-laravel
```

## License

This package is licensed under the MIT License. For detailed information, see the <a href="https://github.com/skapelapp/ipstack-laravel/blob/main/LICENSE">LICENSE</a> file.
