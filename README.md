# Peer Value Distributer

Given an array, return a new array with the same keys and values randomly
distributed evenly amongst the peers in the specified batch quantity.

For example, say you have a group of 15 blog authors. You want each author to
read and review 3 of their peers' work. This function will randomly assign each
author 3 of its peers such that every author is reviewed exactly 3 times.

Branch      | Status
----------- | ------
[master][1] | [![Build Status][3]][2] [![Codecov][8]][7]

[![License][11]][10]
[![Total Downloads][12]][10]
[![Latest Stable Version][9]][10]

Registered on [packagist][6] for easy installation using [composer][5].

    composer require jpuck/peer-value-distributer

## Example

```php
<?php require __DIR__.'/vendor/autoload.php';

use jpuck\PeerValueDistributer;

$works = [
    'John' => 'The Book of John',
    'Jane' => 'A Work by Jane',
    'Jeff' => 'Readings from Jeff',
    'Jose' => 'Words of Jose',
    'Jena' => 'Writing with Jena',
];

print_r(PeerValueDistributer::distribute($works, $count = 3));
```

Output:

>     Array
>     (
>         [Jena] => Array
>             (
>                 [John] => The Book of John
>                 [Jeff] => Readings from Jeff
>                 [Jane] => A Work by Jane
>             )
>
>         [John] => Array
>             (
>                 [Jeff] => Readings from Jeff
>                 [Jane] => A Work by Jane
>                 [Jose] => Words of Jose
>             )
>
>         [Jeff] => Array
>             (
>                 [Jane] => A Work by Jane
>                 [Jose] => Words of Jose
>                 [Jena] => Writing with Jena
>             )
>
>         [Jane] => Array
>             (
>                 [Jose] => Words of Jose
>                 [Jena] => Writing with Jena
>                 [John] => The Book of John
>             )
>
>         [Jose] => Array
>             (
>                 [Jena] => Writing with Jena
>                 [John] => The Book of John
>                 [Jeff] => Readings from Jeff
>             )
>
>     )

[1]:https://github.com/jpuck/peer-value-distributer
[2]:https://travis-ci.org/jpuck/peer-value-distributer
[3]:https://travis-ci.org/jpuck/peer-value-distributer.svg?branch=master
[4]:./public/example.php
[5]:https://getcomposer.org/
[6]:https://packagist.org/packages/jpuck/peer-value-distributer
[7]:https://codecov.io/gh/jpuck/peer-value-distributer/branch/master
[8]:https://img.shields.io/codecov/c/github/jpuck/peer-value-distributer/master.svg
[9]:https://poser.pugx.org/jpuck/peer-value-distributer/v/stable
[10]:https://github.com/jpuck/avhost/releases/latest
[11]:https://poser.pugx.org/jpuck/peer-value-distributer/license
[12]:https://img.shields.io/github/downloads/jpuck/peer-value-distributer/total.svg
