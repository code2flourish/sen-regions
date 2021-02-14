<?php

namespace Natheboy\SenRegions\Tests;

use Natheboy\SenRegions\Adapters\FileGetContentsWrapper;
use Natheboy\SenRegions\RegionFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class RegionFactoryTest.
 * @covers \Natheboy\SenRegions\RegionFactory
 */
class RegionFactoryTest extends TestCase
{
    protected $fileGetContentsWrapper;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fileGetContentsWrapper = $this->createMock(FileGetContentsWrapper::class);
    }

    /** @test */
    public function it_returns_all_regions()
    {
        $mock = $this->createMock(RegionFactory::class);
        $mock->expects($this->any())
            ->method('getData')
            ->with($this->equalTo('./data.json'))
            ->willReturn([]);

        $response = $mock->getAll();
        $this->assertIsArray($response);
    }

    /** @test */
    public function it_returns_a_random_region()
    {
        $regions = new RegionFactory($this->fileGetContentsWrapper, ['Sedhiou']);
        $region = $regions->getRandomRegion();

        $this->assertSame('Sedhiou', $region);
    }

    /** @test */
    public function it_get_data()
    {
        $sut = $this->getSut();

        $simulateJson = '{"departments": [], "regions": "Sedhiou"}';
        $this->fileGetContentsWrapper->method('fileGetContents')->willReturn($simulateJson);
        $this->assertEquals('Sedhiou', $sut->getData('http://example.com/data.json'));
    }

    private function getSut(): RegionFactory
    {
        return new RegionFactory($this->fileGetContentsWrapper);
    }
}
