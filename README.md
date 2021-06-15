# Mfonte Coding Standard

Mfonte Coding Standard is a [Composer](https://getcomposer.org) library that provides custom sets of rules
for [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) to keep our code style consistent across projects.

**This library is intended for PHP CS Fixer v2**. It is still not ready for php-cs-fixer v3.

## Installation

Use `composer` to install `php-cs-fixer` and `mfonte/coding-standard`

```bash
composer require --dev friendsofphp/php-cs-fixer mfonte/coding-standard
```

## Configuration

Create a configuration file `.php_cs.dist` in the root of your project

```php
<?php

use Mfonte\CodingStandard\ConfigurationFactory;

$config = ConfigurationFactory::fromRuleset(new \Mfonte\CodingStandard\Ruleset\DefaultRuleset());
$config->getFinder()->in(__DIR__);

return $config;
```

The `Finder` can be configured to look for PHP files in a single path (as in the example), or in multiple directories.
Is up to you choosing the best configuration based on your project structure.

The caching mechanism of `php-cs-fixer` is enabled by default. You have to add `.php_cs.cache` to `.gitignore` file.

## Usage

```bash
vendor/bin/php-cs-fixer fix
```

See [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer#usage) documentation for all commands and features.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.
