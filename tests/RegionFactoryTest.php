<?php

namespace Natheboy\SenRegions\Tests;

use Natheboy\SenRegions\RegionFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class RegionFactoryTest
 * @package Natheboy\SenRegions\Tests
 * @covers \Natheboy\SenRegions\RegionFactory
 */
class RegionFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_region()
    {
        $regions = new RegionFactory(['Sedhiou']);
        $region = $regions->getRandomRegion();

        $this->assertSame('Sedhiou', $region);
    }

    /** @test */
    public function it_returns_a_predefined_region()
    {
        $predefinedRegions = [
            'Sedhiou',
            'Dakar',
            'Kedougou'
        ];
        $regions = new RegionFactory();
        $region = $regions->getRandomRegion();
        $this->assertContains($region, $predefinedRegions);
    }
}
