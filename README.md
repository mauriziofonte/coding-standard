# Mfonte Coding Standard

Mfonte Coding Standard is a [Composer](https://getcomposer.org) library that provides custom sets of rules
for [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) to keep our code style consistent across projects.

**This library is intended for PHP CS Fixer v3**. It will **not** work with PHP CS Fixer v2.

This library is targeted for projects relying on PHP versions from 7.4 onwards. It will **not** work with PHP versions below 7.4.

## Installation

Use `composer` to install `mfonte/coding-standard`. `php-cs-fixer` _v3_ is automatically installed.

```bash
composer require --dev mfonte/coding-standard
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

## Available Rulesets

- `DefaultRuleset` - The default ruleset customized as per the package maintainer projects
- `LaravelRuleset` - The default ruleset for Laravel projects
- `CmsRuleset` - The default ruleset for CMS projects
- `WordpressRuleset` - The default ruleset for Wordpress projects

## Usage

```bash
vendor/bin/php-cs-fixer fix
```

See [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer#usage) documentation for all commands and features.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.
