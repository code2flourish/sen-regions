<?php

namespace Code2Flourish\SenRegions;

use Code2Flourish\SenRegions\Adapters\FileGetContentsWrapper;

class DepartmentFactory
{
    protected FileGetContentsWrapper $fileGetContentsWrapper;
    protected array $departments = [];

    public function __construct(FileGetContentsWrapper $fileGetContentsWrapper, array $departments = null)
    {
        $this->fileGetContentsWrapper = $fileGetContentsWrapper;
        if ($departments) {
            $this->departments = $departments;
        }
    }

    public function getAll(): array
    {
        $this->departments = $this->getData('./data.json');

        return $this->departments;
    }

    public function getAllByRegion(int $region): array
    {
        return array_filter($this->getAll(), function ($department) use ($region) {
            return $department['region_id'] == $region;
        });
    }

    public function getRandomDepartment(): array
    {
        return $this->departments[array_rand($this->getAll())];
    }

    public function getData(string $path)
    {
        $contents = $this->fileGetContentsWrapper->fileGetContents($path);
        $json = json_decode($contents, true);

        return $json['departments'];
    }
}
