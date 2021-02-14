<?php

namespace Natheboy\SenRegions;

class RegionFactory
{
    protected $regions = [
        'Sedhiou',
        'Dakar',
        'Kedougou'
    ];

    public function __construct(array $regions = null)
    {
        if ($regions) {
            $this->regions = $regions;
        }
    }

    public function getRandomRegion()
    {
        return $this->regions[array_rand($this->regions)];
    }
}
