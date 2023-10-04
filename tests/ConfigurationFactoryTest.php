<?php

declare(strict_types=1);

namespace Mfonte\CodingStandard\Test;

use Prophecy\Prophet;
use PHPUnit\Framework\TestCase;
use Mfonte\CodingStandard\ConfigurationFactory;
use Mfonte\CodingStandard\Ruleset\Ruleset;

class ConfigurationFactoryTest extends TestCase
{
    /** @var Prophet */
    private $prophet;
    
    /**
     * @test
     * @covers \Mfonte\CodingStandard\ConfigurationFactory::fromRuleset
     */
    public function it_should_create_config(): void
    {
        $rules = [
            'foo' => true,
            'bar' => [
                'baz',
            ],
        ];

        $ruleset = $this->prophet->prophesize(Ruleset::class);

        $ruleset->getName()
            ->willReturn('test');

        $ruleset->getRules()
            ->willReturn($rules);

        $config = ConfigurationFactory::fromRuleset($ruleset->reveal());

        self::assertTrue($config->getUsingCache());
        self::assertTrue($config->getRiskyAllowed());
        self::assertSame('test', $config->getName());
        self::assertSame($rules, $config->getRules());
    }

    protected function setUp() : void
    {
        $this->prophet = new Prophet;
    }

    protected function tearDown() : void
    {
        $this->prophet->checkPredictions();
    }
}
