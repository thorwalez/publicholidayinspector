<?php

namespace Test\PublicHolidayInspector\Service;

use PublicHolidayInspector\Service\DateService;
use PHPUnit\Framework\TestCase;

/**
 * Class DateServiceTest
 * @package Test\PublicHolidayInspector\Service
 */
class DateServiceTest extends TestCase
{
    public function testGiveTheLastDayOfMonth()
    {
        $date = new \DateTime('27.12.2019');

        $instance = new DateService();

        $result = $instance->giveTheLastDayOfMonth($date);

        $this->assertEquals('31', $result);
    }

    public function testIsLastDayOfMonthh()
    {
        $date = new \DateTime('31.12.2019');

        $instance = new DateService();

        $result = $instance->isLastDayOfMonth($date);

        $this->assertTrue($result);

        $this->assertNotFalse($result);
    }
}
