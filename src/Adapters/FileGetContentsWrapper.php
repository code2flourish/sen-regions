<?php

namespace Code2Flourish\SenRegions\Adapters;

class FileGetContentsWrapper
{
    public function fileGetContents(string $filename)
    {
        return file_get_contents($filename);
    }
}
