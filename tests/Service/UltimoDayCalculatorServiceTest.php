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


use PublicHolidayInspector\Service\UltimoDayDetermineServiceFactory;
use PublicHolidayInspector\Validator\LastDayValidatorFactory;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * Class UltimoDayCalculatorServiceTest
 * @package Test\PublicHolidayInspector\Service
 */
class UltimoDayCalculatorServiceTest extends TestCase
{

    public function testUltimoFebruaryNoLeapYear()
    {
        $testDate = '2018-02-28';
        $container = $this->prophesize(ContainerInterface::class)->reveal();

        $service = (new UltimoDayDetermineServiceFactory())->create($container);
        $validator = (new LastDayValidatorFactory())->create($container);


        $result = $service->determine(new \DateTime($testDate));

        $this->assertEquals($testDate, $result->format('Y-m-d'));
        $this->assertTrue($validator->isValid($result));
    }

    /**
     * @expectedException \PublicHolidayInspector\Exception\NotFoundUltimoException
     */
    public function testUltimoFebruaryLeapYear()
    {
        $testDate = '2024-02-28';
        $testUltimoDate = '2024-02-29';

        $container = $this->prophesize(ContainerInterface::class)->reveal();

        $service = (new UltimoDayDetermineServiceFactory())->create($container);
        $validator = (new LastDayValidatorFactory())->create($container);

        $this->assertTrue($validator->isValid(new \DateTime($testUltimoDate)));
        $service->determine(new \DateTime($testDate));

    }

    /**
     * fr sa so mo
     * 28 29 30 31
     *
     * @expectedException \PublicHolidayInspector\Exception\NotFoundUltimoException
     */
    public function testNoUltimoDayFromDecemberForAustria()
    {
        $year = date('Y');
        $testDate = '28.12.' . $year;

        $container = $this->prophesize(ContainerInterface::class)->reveal();

        $service = new UltimoDayDetermineServiceFactory();
        $validator = (new LastDayValidatorFactory())->create($container);

        $result = $service($container)->determine(new \DateTime($testDate), '', 'at');
        $this->assertTrue($validator->isValid($result, '', 'at'));
    }


    public function testTwoDaysForLastDayOfMonth()
    {
        $testDate = new \DateTime('29.06.2018');

        $container = $this->prophesize(ContainerInterface::class)->reveal();
        $service = new UltimoDayDetermineServiceFactory();
        $validator = new LastDayValidatorFactory();

        $result = $service($container)->determine($testDate);
        $this->assertTrue($validator($container)->isValid($result));
    }

    /**
     * @expectedException \PublicHolidayInspector\Exception\NotFoundUltimoException
     */
    public function testThreeDaysForLastDayOfMonthThrowsException()
    {
        $testDate = new \DateTime('29.05.2019');

        $container = $this->prophesize(ContainerInterface::class)->reveal();
        $service = (new UltimoDayDetermineServiceFactory())->create($container);

        $service->determine($testDate);
    }
}
