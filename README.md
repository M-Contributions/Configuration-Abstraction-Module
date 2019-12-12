# Utilizing Design by Contract approach to normalize the use of Magento 2 configurations in our projects

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ticaje/m2-configuration.svg?style=flat-square)](https://packagist.org/packages/ticaje/m2-configuration)
[![Quality Score](https://img.shields.io/scrutinizer/g/M-Contributions/Setting.svg?style=flat-square)](https://scrutinizer-ci.com/g/M-Contributions/Setting)
[![Total Downloads](https://img.shields.io/packagist/dt/ticaje/m2-configuration.svg?style=flat-square)](https://packagist.org/packages/ticaje/m2-configuration)

## Preface

This module is an attempt to create a standard approach to normalize the use of all configurations defined in adminhtml/system.xml.
I personally prefer creating a directory structure within adminhtml directory where in a per configuration basis i define 
a file for a group of configurations inside my module.

Then making use of this module i define de interfaces and classes for each file i've created. An example of such workaround
is provided.

## Installation

You can install this package using composer(the only way i recommend)

```bash
composer require ticaje/m2-configuration
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Héctor Luis Barrientos](https://github.com/ticaje)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
