<?php

declare(strict_types=1);

namespace Mfonte\CodingStandard\Ruleset;

abstract class AbstractRuleset implements Ruleset
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var array
     * @psalm-var array<string, bool|array>
     */
    protected $rules = [];

    final public function getName(): string
    {
        return $this->name;
    }

    final public function getRules(): array
    {
        return $this->rules;
    }
}
