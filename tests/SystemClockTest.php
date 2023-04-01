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

namespace SergeYakovlev\Clock\Tests;

use DateTimeImmutable;
use DateTimeZone;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SergeYakovlev\Clock\SystemClock;

final class SystemClockTest extends TestCase
{
    /**
     * @throws ExpectationFailedException
     */
    public function testNowWithDefaultTimezone(): void
    {
        $clock = new SystemClock();

        $expectedTimeBefore = new DateTimeImmutable();
        $actualTime = $clock->now();
        $expectedTimeAfter = new DateTimeImmutable();

        self::assertNotSame($clock->now(), $clock->now());
        self::assertGreaterThanOrEqual($expectedTimeBefore, $actualTime);
        self::assertLessThanOrEqual($expectedTimeAfter, $actualTime);
    }

    /**
     * @throws ExpectationFailedException
     */
    public function testNowWithSpecifiedTimezone(): void
    {
        $timezone = new DateTimeZone('UTC');
        $clock = new SystemClock($timezone);

        $expectedTimeBefore = new DateTimeImmutable(timezone: $timezone);
        $actualTime = $clock->now();
        $expectedTimeAfter = new DateTimeImmutable(timezone: $timezone);

        self::assertNotSame($clock->now(), $clock->now());
        self::assertGreaterThanOrEqual($expectedTimeBefore, $actualTime);
        self::assertLessThanOrEqual($expectedTimeAfter, $actualTime);
    }
}
