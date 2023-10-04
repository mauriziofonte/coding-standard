<?php

declare(strict_types=1);

namespace Mfonte\CodingStandard\Test\Ruleset;

use PHPUnit\Framework\TestCase;
use Mfonte\CodingStandard\Ruleset\DefaultRuleset;
use Mfonte\CodingStandard\Ruleset\Ruleset;
use Mfonte\CodingStandard\Ruleset\CmsRuleset;
use Mfonte\CodingStandard\Ruleset\LaravelRuleset;

class RulesetTest extends TestCase
{
    /**
     * @psalm-return list<array{Ruleset}>
     */
    public static function rulesetDataProvider(): array
    {
        return [
            [new DefaultRuleset()],
            [new CmsRuleset()],
            [new LaravelRuleset()],
        ];
    }

    /**
     * @test
     * @dataProvider rulesetDataProvider
     * @covers       \Mfonte\CodingStandard\Ruleset\AbstractRuleset
     */
    public function it_should_not_be_empty(Ruleset $ruleset): void
    {
        self::assertNotEmpty($ruleset->getName(), sprintf('Failed asserting that "%s" has a name', get_class($ruleset)));
        self::assertNotEmpty($ruleset->getRules(), sprintf('Failed asserting that "%s" has rules', get_class($ruleset)));
    }
}