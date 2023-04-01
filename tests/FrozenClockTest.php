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

use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SergeYakovlev\Clock\FrozenClock;

final class FrozenClockTest extends TestCase
{
    /**
     * @throws ExpectationFailedException
     */
    public function testNowWithMutableDateTime(): void
    {
        $time = new DateTime('2001-02-03T04:05:06+07:00');

        $clock = new FrozenClock($time);

        self::assertEquals($time, $clock->now());
    }

    /**
     * @throws ExpectationFailedException
     */
    public function testNowWithImmutableDateTime(): void
    {
        $time = new DateTimeImmutable('2001-02-03T04:05:06+07:00');

        $clock = new FrozenClock($time);

        self::assertSame($time, $clock->now());
    }
}
