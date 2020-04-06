<?php
/**
 * Copyright (c) 2018.
 *
 * Created By
 * @author Mike Hartl
 * @copyright 2018  Mike Hartl All rights reserved
 * @license  The source code of this document is proprietary work, and is not licensed for distribution or use.
 * @created 13.06.18
 * @version 0.0.1
 *
 */

namespace Test\PublicHolidayInspector\Service;

use PublicHolidayInspector\Day\DayOfGermanUnity;
use PublicHolidayInspector\Day\NewYear;
use PublicHolidayInspector\Interfaces\At\PublicHolidaysConstantsInterface as AtPublicHolidaysConstantsInterface;
use PublicHolidayInspector\Interfaces\De\PublicHolidaysConstantsInterface;
use PublicHolidayInspector\Service\PublicHolidayCalculatorService;
use PublicHolidayInspector\Service\PublicHolidayCalculatorServiceFactory;
use PublicHolidayInspector\Service\Strategy\GermanPublicHolidayCalculatorService;
use PublicHolidayInspector\Service\Strategy\AustriaPublicHolidayCalculatorService;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * Class PublicHolidayCalculatorServiceTest
 * @package Test\PublicHolidayInspector\Service
 */
class PublicHolidayCalculatorServiceTest extends TestCase
{

    public function testFixPublicHolidayNewYear()
    {
        $strategys = ['de' => new GermanPublicHolidayCalculatorService()];

        $phcService = new PublicHolidayCalculatorService($strategys);

        $year = date('Y');
        $result = $phcService->calculate(
            new \DateTime(NewYear::FIX_PUBLIC_HOLIDAY_NEW_YEAR . '.' . $year)
        );

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_NEW_YEAR, $result);
    }

    public function testInvokeCreater()
    {
        $container = $this->prophesize(ContainerInterface::class)->reveal();

        $instance = new PublicHolidayCalculatorServiceFactory();

        $year = date('Y');
        $result = $instance($container)->calculate(
            new \DateTime(NewYear::FIX_PUBLIC_HOLIDAY_NEW_YEAR . '.' . $year)
        );

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_NEW_YEAR, $result);

    }

    public function testFixPublicHolidayDoGU()
    {
        $strategys = ['de' => new GermanPublicHolidayCalculatorService()];

        $phcService = new PublicHolidayCalculatorService($strategys);

        $year = date('Y');
        $result = $phcService->calculate(
            new \DateTime(DayOfGermanUnity::FIX_PUBLIC_HOLIDAY_DAY_OF_GERMAN_UNITY . '.' . $year)
        );

        $this->assertEquals(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_DAY_OF_GERMAN_UNITY, $result);
    }

    public function testDynamicPublicHolidayDoPaRWithGermanState()
    {
        $strategys = ['de' => new GermanPublicHolidayCalculatorService()];

        $phcService = new PublicHolidayCalculatorService($strategys);

        $result = $phcService->calculate(new \DateTime('2018-11-21'), 'SN');

        $this->assertEquals(
            PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_DAY_OF_PRAYER_AND_REPENTANCE,
            $result
        );
    }

    /**
     * @group singleTest
     * @throws \Exception
     */
    public function testDynamicPublicHolidayDoPaRWithOutGermanState()
    {
        $strategys = ['de' => new GermanPublicHolidayCalculatorService()];

        $phcService = new PublicHolidayCalculatorService($strategys);

        $result = $phcService->calculate(new \DateTime('2018-11-21'));

        $this->assertNotEquals(
            PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_DAY_OF_PRAYER_AND_REPENTANCE,
            $result
        );
    }

    public function testFixPublicHolidayMartinsDayWithOutAustriaState()
    {
        $strategys = ['at' => new AustriaPublicHolidayCalculatorService()];

        $phcService = new PublicHolidayCalculatorService($strategys);

        $result = $phcService->calculate(new \DateTime('2018-11-11'), 'BGL', 'at');

        $this->assertEquals(
            AtPublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_MARTINS_DAY,
            $result
        );
    }

    public function testFixPublicHolidayMartinsDayWithAustriaState()
    {
        $strategys = ['at' => new AustriaPublicHolidayCalculatorService()];

        $phcService = new PublicHolidayCalculatorService($strategys);

        $result = $phcService->calculate(new \DateTime('2018-11-11'), '', 'at');

        $this->assertNotEquals(
            AtPublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_MARTINS_DAY,
            $result
        );
    }
}
