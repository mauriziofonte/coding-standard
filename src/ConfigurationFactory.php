<?php

declare(strict_types=1);

namespace Mfonte\CodingStandard;

use Mfonte\CodingStandard\Ruleset\Ruleset;
use PhpCsFixer\Config;

class ConfigurationFactory
{
    public static function fromRuleset(Ruleset $ruleset): Config
    {
        $config = new Config($ruleset->getName());

        $config->setRules($ruleset->getRules());
        $config->setRiskyAllowed(true);
        $config->setUsingCache(true);

        return $config;
    }
}
