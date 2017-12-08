# Peer Value Distributer

Given an array, return a new array with the same keys and values distributed
randomly and evenly amongst the peers in the specified batch quantity.

[![Build Status][3]][2] [![Codecov][8]][7]

For example, say you have a group of 15 book authors. You want each author to
review 3 of their peers' work. This function will randomly assign each
author 3 of its peers to read.

* Every book is reviewed exactly 3 times.
* No one will review any book more than once.
* No one will review their own book.

The natural maximum distribution count is `n-1`
so if you specify a count larger than that,
it will be ignored and the largest possible count will be used instead.

e.g. if you distribute those 15 books with a count of 20,
it will be ignored and instead every author will be assigned the maximum
of 14 peer books to review.

Registered on [packagist][6] for easy installation using [composer][5].

    composer require jpuck/peer-value-distributer

## Example

```php
use jpuck\PeerValueDistributer;

$books = [
    'John' => 'The Book of John',
    'Jane' => 'A Work by Jane',
    'Jeff' => 'Readings from Jeff',
    'Jose' => 'Words of Jose',
    'Jena' => 'Writing with Jena',
];

print_r( PeerValueDistributer::distribute($books, $count = 3) );
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
