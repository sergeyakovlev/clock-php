# Clock

Implementation of the PSR-20 Clock Interface.

## Installation

Install via [Composer](https://getcomposer.org/):

```shell
$ composer require sergeyakovlev/clock
```

## Usage

### System Clock

The current time with default time zone:

```php
use SergeYakovlev\Clock\SystemClock;

$clock = new SystemClock();

echo $clock->now()->format('c');
```

The current time with the specified time zone:

```php
use DateTimeZone;
use SergeYakovlev\Clock\SystemClock;

$clock = new SystemClock(
    new DateTimeZone('UTC')
);

echo $clock->now()->format('c');
```

### Frozen Clock

The specified time:

```php
use DateTimeImmutable;
use SergeYakovlev\Clock\FrozenClock;

$clock = new FrozenClock(
    new DateTimeImmutable('2001-02-03T04:05:06+07:00')
);

echo $clock->now()->format('c'); // 2001-02-03T04:05:06+07:00
```

## Links

* PHP-FIG.org: [PSR-20 Clock](https://www.php-fig.org/psr/psr-20/)
* GitHub: [PSR Clock](https://github.com/php-fig/clock)
