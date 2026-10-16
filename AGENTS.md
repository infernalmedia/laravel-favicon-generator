# AGENTS.md

Guidance for coding agents and contributors working on `infernalmedia/laravel-favicon-generator`.

## Overview

Laravel package (spatie/laravel-package-tools) that generates favicons from a
single source image via the `favicon:generate` Artisan command, and ships a
`<x-favicon-meta />` Blade component rendering the favicon meta tags. Namespace:
`InfernalMedia\LaravelFaviconGenerator`. Supports Laravel 12 and 13, PHP 8.3+.

## Structure

- `src/LaravelFaviconGenerator.php` — generator; Intervention Image v4 API
  (`decodePath`, `createImage`, `insert`, `save`), Imagick driver preferred with
  GD fallback, native `\Imagick` calls for high-quality large PNGs
- `src/Commands/LaravelFaviconGeneratorCommand.php` — `favicon:generate` command
- `src/View/Components/FaviconMeta.php` + `resources/views/components/favicon-meta.blade.php`
- `src/LaravelFaviconGeneratorServiceProvider.php` — package registration
- `config/favicon-generator.php` — output path, favicon types, manifest content
- `tests/` — PHPUnit tests on orchestra/testbench

## Commands

```bash
composer install        # install deps (runs testbench package:discover)
composer test           # PHPUnit
composer analyse        # PHPStan via larastan (level 5, src + config)
composer format         # Laravel Pint
```

## Conventions

- English everywhere: code, comments, docs, commit messages.
- Commits in conventional commit format (`feat:`, `fix:`, `docs:`, `style:`,
  `chore:`); no tool attribution, no co-author trailers.
- Code style: Pint with the local `pint.json` — laravel preset plus
  `concat_space` spacing `none` (concatenate without spaces: `$a.$b`).
- Tests are PHPUnit classes, never Pest. `final` class, `#[Group('...')]`
  attribute, `/** @see ... */` docblock, `#[Test]` attribute on methods named
  `it_...` in snake_case, and this line right after `<?php`:
  `//phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps`
- Use `config('favicon-generator...')` for every configurable path/filename —
  never hardcode `favicon/` paths (the component reads `output_path`).
- Verify before committing: `composer test`, `composer analyse`,
  `composer format`.

## Release flow

Versions come from git tags (`v2.0.0`). Tagging + creating a GitHub Release
publishes to Packagist and triggers the `update-changelog` workflow which fills
CHANGELOG.md.
