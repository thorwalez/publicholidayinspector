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

namespace Test\PublicHolidayInspector\Validator;

use PublicHolidayInspector\Service\DateService;
use PublicHolidayInspector\Service\PublicHolidayCalculatorServiceFactory;
use PublicHolidayInspector\Validator\LastDayValidator;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * Class LastDayValidatorTest
 * @package Test\PublicHolidayInspector\Validator
 */
class LastDayValidatorTest extends TestCase
{
    public function testDayIsWorkingDay()
    {
        $container = $this->prophesize(ContainerInterface::class)->reveal();

        $publicHolidayService = (new PublicHolidayCalculatorServiceFactory())->create($container);

        $testDate = new \DateTime('28-12-2018');

        /** @var LastDayValidator $validator */
        $validator = new LastDayValidator($publicHolidayService, new DateService());

        $this->assertTrue($validator->isValid($testDate));
    }

    public function testDayIsNotWorkingDay()
    {
        $container = $this->prophesize(ContainerInterface::class)->reveal();

        $publicHolidayService = (new PublicHolidayCalculatorServiceFactory())->create($container);

        $testDate = new \DateTime('30-12-2018');

        /** @var LastDayValidator $validator */
        $validator = new LastDayValidator($publicHolidayService, new DateService());

        $this->assertFalse($validator->isValid($testDate));
    }

    public function testFindTheLastValidDayFromMonth()
    {
        $container = $this->prophesize(ContainerInterface::class)->reveal();

        $publicHolidayService = (new PublicHolidayCalculatorServiceFactory())->create($container);

        $testDate = new \DateTime('28-12-2018');

        /** @var LastDayValidator $validator */
        $validator = new LastDayValidator($publicHolidayService, new DateService());

        $this->assertTrue($validator->isValid($testDate));
    }

    /**
     *
     * @group  singleTest
     * @throws \Exception
     */
    public function testFindTheLastValidDayFromMonthMayAtNRW()
    {
        $container = $this->prophesize(ContainerInterface::class)->reveal();

        $publicHolidayService = (new PublicHolidayCalculatorServiceFactory())->create($container);

        $testDate = new \DateTime('30-05-2018');

        /** @var LastDayValidator $validator */
        $validator = new LastDayValidator($publicHolidayService, new DateService());

        $this->assertTrue($validator->isValid($testDate, 'nw'));
    }

    public function testNotTheLastDayFromMonth()
    {
        $container = $this->prophesize(ContainerInterface::class)->reveal();

        $publicHolidayService = (new PublicHolidayCalculatorServiceFactory())->create($container);

        $testDate = new \DateTime('28-02-2024');

        /** @var LastDayValidator $validator */
        $validator = new LastDayValidator($publicHolidayService, new DateService());

        $this->assertFalse($validator->isValid($testDate));
    }

    /**
     * @group specialcases
     */
    public function testSpecialCases()
    {
        $container = $this->prophesize(ContainerInterface::class)->reveal();

        $publicHolidayService = (new PublicHolidayCalculatorServiceFactory())->create($container);

        $testDate = new \DateTime('27-06-2018');

        /** @var LastDayValidator $validator */
        $validator = new LastDayValidator($publicHolidayService, new DateService());

        $this->assertFalse($validator->isValid($testDate));

        $this->assertInternalType('array', $validator->getMessages());
    }
}
