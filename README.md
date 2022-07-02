# Bisect

[![Code Coverage](https://scrutinizer-ci.com/g/ddlzz/bisect/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/ddlzz/bisect/?branch=main) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ddlzz/bisect/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/ddlzz/bisect/?branch=main) [![Packagist](https://img.shields.io/packagist/v/ddlzz/bisect.svg)](https://packagist.org/packages/ddlzz/bisect)

A tiny library that implements the functionality of the Python bisect module.

## Quick start
```
composer require ddlzz/bisect
```
```php
<?php

declare(strict_types=1);

use Ddlzz\Bisect\Bisect;

require_once 'vendor/autoload.php';

$sortedArray = [ // it works only with sorted arrays
    23,
    55,
    127,
    128,
    200,
    250,
    300,
    312,
];

$leftKey = Bisect::left($array, 100); // returns 2
$leftKey = Bisect::left($array, 55); // returns 1
$rightKey = Bisect::right($array, 55); // returns 2
```