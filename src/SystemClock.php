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
use DateTimeZone;
use Psr\Clock\ClockInterface;

/**
 * PSR-20 Clock implementation.
 */
final class SystemClock implements ClockInterface
{
    public function __construct(
        private ?DateTimeZone $timezone = null,
    ) {
    }

    /**
     * Returns the current time.
     */
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable(timezone: $this->timezone);
    }
}
