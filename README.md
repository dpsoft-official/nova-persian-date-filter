# Nova Persian Date Filter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dpsoft/nova-persian-date-filter.svg?style=flat-square)](https://packagist.org/packages/dpsoft/nova-persian-date-filter)
[![Total Downloads](https://img.shields.io/packagist/dt/dpsoft/nova-persian-date-filter.svg?style=flat-square)](https://packagist.org/packages/dpsoft/nova-persian-date-filter)

![screenshot 1](https://raw.githubusercontent.com/dpsoft-official/nova-persian-date-filter/master/docs/persian-date-filter.png)

With this package you can use persian date filter in nova.

## Installation

Install package via composer:

```bash
composer require dpsoft/nova-persian-date-filter
```

The package will automatically register itself.

## Usage
Extend `Dpsoft\NovaPersiandateFilter\PersianDateFilter` and in `apply` method parse value with `Carbon` and use in `query`:
```php
<?php

namespace App\Nova\Filters;

use Dpsoft\NovaPersiandateFilter\PersianDateFilter;
...

class InvoicesFrom extends PersianDateFilter
{
    public function apply(Request $request, $query, $value)
    {
        $value = Carbon::parse($value)->startOfDay();

        return $query->where('created_at', ">=", $value);
    }
}
```

## Security

If you discover any security related issues, please email `sadeghpm@gmail.com` instead of using the issue tracker.

## Credits

- [Dpsoft](https://github.com/dpsoft-official)
- [SadeghPM](https://github.com/sadeghpm)
