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

namespace Test\PublicHolidayInspector\Service\Strategy;

use PublicHolidayInspector\Interfaces\At\PublicHolidaysConstantsInterface;
use PublicHolidayInspector\Service\Strategy\AustriaPublicHolidayCalculatorService;
use PHPUnit\Framework\TestCase;

/**
 * Class AustriaPublicHolidayCalculatorServiceTest
 * @package Test\PublicHolidayInspector\Service\Strategy
 */
class AustriaPublicHolidayCalculatorServiceTest extends TestCase
{
    /** @var \ReflectionMethod */
    private $reflectionMethod;

    public function setUp()
    {
        $instanceReflection = new \ReflectionClass(AustriaPublicHolidayCalculatorService::class);
        $method = $instanceReflection->getMethod('calculateDynamicHolidays');
        $method->setAccessible(true);
        $this->reflectionMethod = $method;
    }

    public function testCalculatorWorkingDay()
    {
        $date = new \DateTime('20.12.2019');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals('Arbeitstag', $result);
    }

    /**
     * @group singleTest
     */
    public function testNewHolidyCalculatorEasterSunday()
    {
        $date = new \DateTime('12.04.2020');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '12.04'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_EASTER_SUNDAY, $result);

        $result = $instance->calculate($date);
        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_EASTER_SUNDAY, $result);
    }

    public function testNewHolidyCalculatorEasterMonday()
    {
        $date = new \DateTime('13.04.2020');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '13.04'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_EASTER_MONDAY, $result);
    }

    public function testNewHolidyCalculatorWhitSunday()
    {
        $date = new \DateTime('31.05.2020');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '31.05'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_WHITSUNDAY, $result);
    }

    public function testNewHolidyCalculatorWhitMonday()
    {
        $date = new \DateTime('01.06.2020');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '01.06'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_WHITMONDAY, $result);
    }

    public function testNewHolidyCalculatorAscensionDay()
    {
        $date = new \DateTime('21.05.2020');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '21.05'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_ASCENSION_DAY, $result);

        $result = $instance->calculate($date);
        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_ASCENSION_DAY, $result);
    }

    /** @group singlTest */
    public function testNewHolidyCalculatorCorpusChristi()
    {
        $date = new \DateTime('11.06.2020');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $this->reflectionMethod->invokeArgs($instance,array($date, '11.06'));

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_CORPUS_CHRISTI, $result);

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_CORPUS_CHRISTI, $result);
    }

    public function testCalculatorThreeHolyKings()
    {
        $date = new \DateTime('06.01.2020');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_THREE_HOLY_KINGS, $result);
    }

    public function testCalculatorMaryAscension()
    {
        $date = new \DateTime('15.08.2020');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_MARY_ASCENSION, $result);
    }

    public function testCalculatorAllSaintsDay()
    {
        $date = new \DateTime('01.11.2020');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_ALL_SAINTS_DAY, $result);
    }

    public function testCalculatorChristmasEve()
    {
        $date = new \DateTime('24.12.2019');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_CHRISTMAS_EVE, $result);
    }

    public function testCalculatorFirstChristmansDay()
    {
        $date = new \DateTime('25.12.2020');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_1_CHRISTMAS_DAY, $result);
    }

    public function testCalculatorSecondChristmansDay()
    {
        $date = new \DateTime('26.12.2020');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_2_CHRISTMAS_DAY, $result);
    }

    public function testCalculatorMaryConception()
    {
        $date = new \DateTime('08.12.2020');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_MARY_CONCEPTION, $result);
    }

    public function testCalculatorNewYear()
    {
        $date = new \DateTime('01.01.2019');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_NEW_YEAR, $result);
    }

    public function testCalculatorLeopoldiDay()
    {
        $date = new \DateTime('15.11.2019');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date, 'W');

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_LEOPOLDI_DAY, $result);
    }

    public function testCalculatorMartinsDay()
    {
        $date = new \DateTime('11.11.2019');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date, 'BGL');

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_MARTINS_DAY, $result);
    }

    public function testCalculatorNationalHoliday()
    {
        $date = new \DateTime('26.10.2019');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_NATIONAL_HOLIDAY, $result);
    }

    public function testCalculatorStaatHoliday()
    {
        $date = new \DateTime('01.05.2019');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date);

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_STAAT_HOLIDAY, $result);
    }

    public function testCalculatorDayOfReferendum()
    {
        $date = new \DateTime('10.10.2019');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date, 'KTN');

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_DAY_OF_REFERENDUM, $result);
    }

    public function testCalculatorRubert()
    {
        $date = new \DateTime('24.09.2019');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date, 'STMK');

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_RUPERT, $result);
    }

    public function testCalculatorFlorian()
    {
        $date = new \DateTime('04.05.2019');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date, 'OOE');

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_FLORIAN, $result);
    }

    public function testCalculatorJosef()
    {
        $date = new \DateTime('19.03.2019');

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate($date, 'T');

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_JOSEF, $result);
    }

    public function testDateIsNull()
    {

        $instance = new AustriaPublicHolidayCalculatorService();

        $result = $instance->calculate();

        $this->assertNotEmpty($result);
    }
}
