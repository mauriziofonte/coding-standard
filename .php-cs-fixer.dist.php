<?php

use Mfonte\CodingStandard\ConfigurationFactory;

$config = ConfigurationFactory::fromRuleset(new \Mfonte\CodingStandard\Ruleset\DefaultRuleset());
$config->getFinder()->in(__DIR__);

return $config;
