[![Build Status](https://travis-ci.com/gordesch/cine-carbon.svg?branch=master)](https://travis-ci.com/gordesch/cine-carbon)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Packagist](https://img.shields.io/packagist/v/gordesch/cine-carbon.svg)](https://packagist.org/packages/gordesch/cine-carbon)

# Cine-Carbon

A custom [Carbon](https://github.com/briannesbitt/carbon) class to provide a french movie week locale (it starts on wednesdays).

## Installation

```bash
$ composer require gordesch/cine-carbon:^1.0.0
```

## Usage

```php
CineCarbon::now()->startOfWeek()->dayOfWeek;     // 3 (Wednesday)
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
