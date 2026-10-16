# Contributing

Contributions are welcome via issues and pull requests on
[GitHub](https://github.com/infernalmedia/laravel-favicon-generator).

## Setup

```bash
git clone git@github.com:infernalmedia/laravel-favicon-generator.git
cd laravel-favicon-generator
composer install
```

## Development

- Run tests: `composer test`
- Static analysis: `composer analyse`
- Code style: `composer format` (Laravel Pint)

Please add or update tests for any behavior change. Tests are PHPUnit classes
running on orchestra/testbench — see existing tests in `tests/` for the
conventions to follow.

## Pull requests

- Write commit messages in conventional commit format, in English.
- Keep PRs focused on a single change.
- Make sure `composer test`, `composer analyse` and `composer format` pass.
