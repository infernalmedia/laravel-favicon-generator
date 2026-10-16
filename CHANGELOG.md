# Changelog

All notable changes to `laravel-favicon-generator` will be documented in this file.

## v2.0.0 - 2026-10-16

**Full Changelog**: https://github.com/infernalmedia/laravel-favicon-generator/commits/v2.0.0

## 2.0.0 - unreleased

- Added support for Laravel 13, dropped support for Laravel 10 and 11
- Raised minimum PHP version to 8.3
- Upgraded `intervention/image` to v4
- Renamed package to `infernalmedia/laravel-favicon-generator` and namespace to `InfernalMedia\LaravelFaviconGenerator`
- Replaced Pest with PHPUnit for the test suite
- The `favicon-meta` Blade component now honors the `output_path` and filename config options
- Added `mobile-web-app-capable` meta tag alongside the deprecated `apple-mobile-web-app-capable`
- Removed unused skeleton leftovers (configure.php, database stubs)

## 1.1.1 - 2025-05-11

- Fixed issue where generated SVG favicons were not square, causing display problems
- Added web app title meta tags to the favicon-meta component
- Added apple-mobile-web-app-capable and apple-mobile-web-app-status-bar-style meta tags

## 1.1.0 - 2025-05-11

- Fixed bug where .svg favicons were not generated correctly from non-SVG source images
- Added command options to specify web manifest details (name, short_name, theme_color, background_color)

## 1.0.0 - 2025-05-11

- Initial release
