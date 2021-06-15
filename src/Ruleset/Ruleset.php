<?php

declare(strict_types=1);

namespace Mfonte\CodingStandard\Ruleset;

interface Ruleset
{
    public function getName(): string;

    /**
     * @psalm-return array<string, bool|array>
     */
    public function getRules(): array;
}
