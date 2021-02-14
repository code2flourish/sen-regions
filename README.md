[![Build Status](https://travis-ci.org/code2flourish/sen-regions.svg?branch=main)](https://travis-ci.org/code2flourish/sen-regions)
[![StyleCI](https://github.styleci.io/repos/338862799/shield?branch=main)](https://github.styleci.io/repos/338862799?branch=main)
# Senegal Regions and Departments

Use this package if you want to have all the regions and departments in Senegal  

## Installation

Require the package using composer

```bash
composer require code2flourish/senregions
```

## Usage

#### To get all regions
```php
use Code2Flourish\SenRegions\RegionFactory;
use Code2Flourish\SenRegions\Adapters\FileGetContentsWrapper;

$fileSystem = new FileGetContentsWrapper();
$factory = new RegionFactory($fileSystem);

$regions = $factory->getAll();
```

#### To get random regions
```php
use Code2Flourish\SenRegions\RegionFactory;
use Code2Flourish\SenRegions\Adapters\FileGetContentsWrapper;

$fileSystem = new FileGetContentsWrapper();
$factory = new RegionFactory($fileSystem);

$region = $factory->getRandomRegion();
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](./LICENSE.md)