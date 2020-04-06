<?php
/**
 * Copyright (c) 2019.
 *
 * Created By
 * @author Mike Hartl
 * @copyright 2019  Mike Hartl All rights reserved
 * @license  The source code of this document is proprietary work, and is not licensed for distribution or use.
 * @created 25.12.2019
 * @version 0.0.1
 *
 */

namespace  Test\PublicHolidayInspector\Service\Strategy;

use PublicHolidayInspector\Exception\DateIsNotValidException;
use PublicHolidayInspector\Interfaces\De\PublicHolidaysConstantsInterface;
use PublicHolidayInspector\Service\Strategy\GermanPublicHolidayCalculatorService;
use PHPUnit\Framework\TestCase;

/**
 * Class GermanPublicHolidayCalculatorServiceTest
 * @package Test\PublicHolidayInspector\Service\Strategy
 */
class GermanPublicHolidayCalculatorServiceTest extends TestCase
{
    /** @var \ReflectionMethod */
    private $reflectionMethod;

    public function setUp()
    {
        $instanceReflection = new \ReflectionClass(GermanPublicHolidayCalculatorService::class);
        $method = $instanceReflection->getMethod('calculateDynamicHolidays');
        $method->setAccessible(true);
        $this->reflectionMethod = $method;
    }

    public function testCalculatorWorkingDay()
    {
        $date = new \DateTime('20.12.2019');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals('Arbeitstag', $result);
    }

    /** @Note Dynamic Holidays */

    public function testNewHolidyCalculatorGoodFriday()
    {
        $date = new \DateTime('10.04.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '10.04'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_GOOD_FRIDAY, $result);
    }

    public function testNewHolidyCalculatorEasterSunday()
    {
        $date = new \DateTime('12.04.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '12.04'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_EASTER_SUNDAY, $result);
    }

    public function testNewHolidyCalculatorEasterMonday()
    {
        $date = new \DateTime('13.04.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '13.04'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_EASTER_MONDAY, $result);
    }

    public function testNewHolidyCalculatorWhitSunday()
    {
        $date = new \DateTime('31.05.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '31.05'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_WHITSUNDAY, $result);
    }

    public function testNewHolidyCalculatorWhitMonday()
    {
        $date = new \DateTime('01.06.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '01.06'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_WHITMONDAY, $result);
    }

    public function testNewHolidyCalculatorAscensionDay()
    {
        $date = new \DateTime('21.05.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '21.05'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_ASCENSION_DAY, $result);

        $result = $instance->calculate($date);
        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_ASCENSION_DAY, $result);
    }

    public function testNewHolidyCalculatorCorpusChristi()
    {
        $date = new \DateTime('11.06.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '11.06', 'SN'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_CORPUS_CHRISTI, $result);

        $result = $instance->calculate($date, 'SN');

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_CORPUS_CHRISTI, $result);
    }

    /** Fix Holidays */

    public function testNewHolidyCalculatorLaborDay()
    {
        $date = new \DateTime('01.05.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '01.05'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_LABOR_DAY, $result);
    }

    public function testCalculatorChristmasEve()
    {
        $date = new \DateTime('24.12.2019');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals('Heiliger Abend (Bankfeiertag)', $result);
    }

    public function testCalculatorNewYear()
    {
        $date = new \DateTime('01.01.2019');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_NEW_YEAR, $result);
    }

    public function testCalculatorThreeHolyKings()
    {
        $date = new \DateTime('06.01.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate($date,'ST');

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_THREE_HOLY_KINGS, $result);
    }

    public function testCalculatorMaryAscension()
    {
        $date = new \DateTime('15.08.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate($date,'BY');

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_MARY_ASCENSION, $result);
    }

    public function testCalculatorDayOfGermanUnity()
    {
        $date = new \DateTime('03.10.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_DAY_OF_GERMAN_UNITY, $result);
    }

    public function testCalculatorReformationDayOrHalloween()
    {
        $date = new \DateTime('31.10.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate($date,'SN');

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_REFORAMTION_DAY, $result);
    }

    public function testCalculatorAllSaintsDay()
    {
        $date = new \DateTime('01.11.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate($date,'NW');

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_ALL_SAINTS_DAY, $result);
    }

    public function testCalculatorDayOfPrayerAndRepentance()
    {
        $date = new \DateTime('18.11.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate($date,'SN');

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_DAY_OF_PRAYER_AND_REPENTANCE, $result);
    }

    public function testCalculatorFirstChristmansDay()
    {
        $date = new \DateTime('25.12.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_1_CHRISTMAS_DAY, $result);
    }

    public function testCalculatorSecondChristmansDay()
    {
        $date = new \DateTime('26.12.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_2_CHRISTMAS_DAY, $result);
    }

    public function testCalculatorNewYearsEve()
    {
        $date = new \DateTime('31.12.2020');

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_NEW_YEARS_EVE, $result);
    }

    public function testDateIsNull()
    {

        $instance = new GermanPublicHolidayCalculatorService();

        $result = $instance->calculate();

        $this->assertNotEmpty($result);
    }

}
