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

namespace PublicHolidayInspector\Service;

use PublicHolidayInspector\Service\Strategy\AustriaPublicHolidayCalculatorService;
use PublicHolidayInspector\Service\Strategy\GermanPublicHolidayCalculatorService;
use Psr\Container\ContainerInterface;

/**
 * Class PublicHolidayCalculatorServiceFactory
 * @package PublicHolidayInspector\Service
 */
class PublicHolidayCalculatorServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return PublicHolidayCalculatorService
     */
    public function __invoke(ContainerInterface $container)
    {
        return $this->create($container);
    }

    /**
     * @param ContainerInterface $container
     * @return PublicHolidayCalculatorService
     */
    public function create(ContainerInterface $container)
    {
        return new PublicHolidayCalculatorService($this->getStrategys());
    }

    /**
     * @return array
     */
    private function getStrategys()
    {
        return [
            'de' => new GermanPublicHolidayCalculatorService(),
            'at' => new AustriaPublicHolidayCalculatorService(),
        ];
    }
}
