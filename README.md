# Laravel Favicon Generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/infernalmedia/laravel-favicon-generator.svg?style=flat-square)](https://packagist.org/packages/infernalmedia/laravel-favicon-generator)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/infernalmedia/laravel-favicon-generator/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/infernalmedia/laravel-favicon-generator/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/infernalmedia/laravel-favicon-generator/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/infernalmedia/laravel-favicon-generator/actions?query=workflow%3Afix-php-code-style-issues.yml+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/infernalmedia/laravel-favicon-generator.svg?style=flat-square)](https://packagist.org/packages/infernalmedia/laravel-favicon-generator)

A Laravel package to generate and manage high-quality favicons for your web application. This package provides two main features:

1. A generator to create all necessary favicon files from a single source image with optimal quality
2. A Blade component to easily include the favicon meta tags in your HTML

This package is a maintained fork of [`blockpoint/laravel-favicon-generator`](https://github.com/blockpoint/laravel-favicon-generator), compatible with Laravel 12 and 13.

## Features

- Generates high-quality PNG icons using Imagick when available (with GD fallback)
- Creates favicon.ico, favicon-96x96.png, favicon.svg, apple-touch-icon.png
- Generates web app manifest icons (192x192 and 512x512)
- Creates site.webmanifest file
- Generates SVG favicon from any source image format
- Maintains aspect ratio while ensuring exact dimensions

## Requirements

- PHP 8.3 or higher
- Laravel 12 or 13
- GD or Imagick PHP extension

## Installation

You can install the package via composer:

```bash
composer require infernalmedia/laravel-favicon-generator
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="favicon-generator-config"
```

Optionally, you can publish the views using:

```bash
php artisan vendor:publish --tag="favicon-generator-views"
```

## Usage

### Generating Favicons

To generate favicons from a source image, use the provided Artisan command:

```bash
php artisan favicon:generate {path/to/your/source/image.png}
```

This will generate the following favicon files in your `public/favicon` directory (configurable via the `output_path` config option):

- favicon.ico for general browser support
- favicon-96x96.png for higher-resolution displays
- favicon.svg for scalable, high-quality vector images (if source is SVG)
- apple-touch-icon.png for iOS devices
- web-app-manifest-192x192.png and web-app-manifest-512x512.png for Progressive Web Apps
- site.webmanifest for PWA configuration

### Using the Blade Component

To include the favicon meta tags in your HTML, add the following component to your layout file:

```blade
<head>
    <!-- Other head elements -->
    <x-favicon-meta />
</head>
```

This will output the necessary meta tags for all generated favicons:

```html
<link
    rel="icon"
    type="image/png"
    href="/favicon/favicon-96x96.png"
    sizes="96x96"
/>
<link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
<link rel="shortcut icon" href="/favicon/favicon.ico" />
<link
    rel="apple-touch-icon"
    sizes="180x180"
    href="/favicon/apple-touch-icon.png"
/>
<link rel="manifest" href="/favicon/site.webmanifest" />
<meta name="application-name" content="Your App Name" />
<meta name="apple-mobile-web-app-title" content="Your App Name" />
<meta name="mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="default" />
```

The component will automatically use the application name from your web manifest file or fall back to your Laravel app name configuration.

### Programmatic Usage

You can also generate favicons programmatically:

```php
use InfernalMedia\LaravelFaviconGenerator\LaravelFaviconGenerator;

$generator = new LaravelFaviconGenerator();
$generatedFiles = $generator->generate('path/to/your/source/image.png');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Upgrading

Please see [UPGRADING](UPGRADING.md) for details on migrating from `blockpoint/laravel-favicon-generator` 1.x.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Infernal Média](https://github.com/infernalmedia)
- [Blockpoint](https://github.com/blockpoint) for the original package
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
