<?php

namespace Natheboy\SenRegions;

use Natheboy\SenRegions\Adapters\FileGetContentsWrapper;

class RegionFactory
{
    protected FileGetContentsWrapper $fileGetContentsWrapper;
    protected array $regions = [];

    public function __construct(FileGetContentsWrapper $fileGetContentsWrapper, array $regions = null)
    {
        $this->fileGetContentsWrapper = $fileGetContentsWrapper;
        if ($regions) {
            $this->regions = $regions;
        }
    }

    public function getAll(): array
    {
        $this->regions = $this->getData('./data.json');

        return $this->regions;
    }

    public function getRandomRegion(): string
    {
        return $this->regions[array_rand($this->regions)];
    }

    public function getData(string $path)
    {
        $contents = $this->fileGetContentsWrapper->fileGetContents($path);
        $json = json_decode($contents, true);

        return $json['regions'];
    }
}
