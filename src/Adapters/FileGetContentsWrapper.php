<?php

namespace Natheboy\SenRegions\Adapters;

class FileGetContentsWrapper
{
    public function fileGetContents(string $filename)
    {
        return file_get_contents($filename);
    }
}
