# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bdp-raymon/chinese-gender-prediction.svg?style=flat-square)](https://packagist.org/packages/bdp-raymon/chinese-gender-prediction)
[![Build Status](https://img.shields.io/travis/bdp-raymon/chinese-gender-prediction/master.svg?style=flat-square)](https://travis-ci.org/bdp-raymon/chinese-gender-prediction)
[![Quality Score](https://img.shields.io/scrutinizer/g/bdp-raymon/chinese-gender-prediction.svg?style=flat-square)](https://scrutinizer-ci.com/g/bdp-raymon/chinese-gender-prediction)
[![Total Downloads](https://img.shields.io/packagist/dt/bdp-raymon/chinese-gender-prediction.svg?style=flat-square)](https://packagist.org/packages/bdp-raymon/chinese-gender-prediction)

A php package for predict your baby gender base on chinese calendar

## Installation

You can install the package via composer:

```bash
composer require bdp-raymon/chinese-gender-prediction
```

## Usage
``` php
use BdpRaymon\ChineseGenderPrediction\ChineseGenderPrediction;

// initialize class
$prediction = new ChineseGenderPrediction();

// set mother age
$prediction->motherAge(18);

// set pregnancy month
$prediction->pregnancyMonth(0);

// get the prediction, it could be either boy or girl
$prediction->predict(); // boy


// use of chaining
$gender = (new ChineseGenderPrediction())
            ->motherAge(18)
            ->pregnancyMonth(0)
            ->predict();


// or you could use the config constructor
$gender = (new ChineseGenderPrediction([
            'mother_age' => 18,
            'pregnancy_month' => 0
           ]))
            ->predict();
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email alishabani9270@gmail.com instead of using the issue tracker.

## Credits

- [Ali Shabani](https://github.com/bdp-raymon)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).

## TODO
 - config scrutinizer
 - config styleci
 - config travis
