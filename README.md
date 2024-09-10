# Laravel Markdown

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mindtwo/laravel-markdown.svg?style=flat-square)](https://packagist.org/packages/mindtwo/laravel-markdown)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mindtwo/laravel-markdown/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mindtwo/laravel-markdown/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mindtwo/laravel-markdown/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mindtwo/laravel-markdown/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mindtwo/laravel-markdown.svg?style=flat-square)](https://packagist.org/packages/mindtwo/laravel-markdown)

`laravel-markdown` is a simple, lightweight package for cleaning up and adjusting markdown content in Laravel applications. It provides functionality to remove bold formatting from markdown headlines and dynamically adjust the heading levels in markdown content based on a configurable maximum level. This is especially useful when rendering user-generated content and ensuring consistency in markdown formatting across your application.

## Features

- **Remove Bold from Headlines**: Automatically strip bold formatting (e.g., `**Heading**`) from markdown headings.
- **Adjust Headline Levels**: Dynamically adjust markdown heading levels (e.g., `#` to `##`, `##` to `###`, etc.) based on a configurable maximum level.

## Installation

You can install the package via composer:

```bash
composer require mindtwo/laravel-markdown
```

## Usage

To clean up your markdown content, you can use the `CleanupMarkdown` class, which handles both removing bold formatting from headlines and adjusting headline levels.

### Example

```php
use mindtwo\LaravelMarkdown\CleanupMarkdown;

$markdown = "# **Bold Heading**\n## **Bold Subheading**";
$cleanedMarkdown = (new CleanupMarkdown())->execute($markdown, 2);

echo $cleanedMarkdown;
// Outputs:
// ## Heading
// ### Subheading
```

In this example, the maximum headline level is set to `2`, so all `#` headings are adjusted to `##`, and bold formatting is removed from both headings.

## Customization

You can specify the maximum headline level when calling the `execute` method. This determines how the headline levels will be adjusted:

```php
$cleanedMarkdown = (new CleanupMarkdown())->execute($markdown, 3); // Max headline level is 3
```

## Testing

To run the package's tests, use:

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Contributions are welcome! Please see [CONTRIBUTING](CONTRIBUTING.md) for details on how to contribute.

## Security Vulnerabilities

If you discover any security-related issues, please review [our security policy](../../security/policy) for how to report them.

## Credits

- [mindtwo GmbH](https://github.com/mindtwo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
