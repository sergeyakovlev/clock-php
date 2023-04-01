<?php

/**
 * This file is part of the Clock package.
 *
 * @author Serge Yakovlev <serge.yakovlev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SergeYakovlev\Clock;

use DateTimeImmutable;
use DateTimeInterface;
use Psr\Clock\ClockInterface;

/**
 * PSR-20 Clock implementation.
 */
final class FrozenClock implements ClockInterface
{
    private DateTimeImmutable $time;

    public function __construct(DateTimeInterface $time)
    {
        $this->time = $time instanceof DateTimeImmutable
            ? $time
            : DateTimeImmutable::createFromInterface($time);
    }

    /**
     * Returns the specified time.
     */
    public function now(): DateTimeImmutable
    {
        return $this->time;
    }
}
