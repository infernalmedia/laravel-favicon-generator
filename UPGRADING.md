# Upgrading

## From blockpoint/laravel-favicon-generator 1.x to 2.x

The 2.0 release is a maintained fork published under a new vendor name.

### Package name

```bash
composer remove blockpoint/laravel-favicon-generator
composer require infernalmedia/laravel-favicon-generator
```

### Requirements

- PHP 8.3+ (was 8.1+)
- Laravel 12 or 13 (was 10–12)

### Namespace

Every `use` statement must be updated:

```php
// Before
use Blockpoint\LaravelFaviconGenerator\LaravelFaviconGenerator;

// After
use InfernalMedia\LaravelFaviconGenerator\LaravelFaviconGenerator;
```

The Blade component name is unchanged: `<x-favicon-meta />`.

### Configuration

The config file name and keys are unchanged (`favicon-generator`). Republish
the config if you had a published copy:

```bash
php artisan vendor:publish --tag="favicon-generator-config" --force
```

### Behavior changes

- `intervention/image` was upgraded to v4 — internal change only, the public
  `generate()` signature is unchanged.
- The `favicon-meta` component now honors `output_path` and the configured
  filenames instead of hardcoded `favicon/` paths.
- The rendered HTML additionally includes `<meta name="mobile-web-app-capable">`.
