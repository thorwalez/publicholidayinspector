<?php
/**
 * Copyright (c) 2018.
 * Created By
 * @author    Mike Hartl
 * @copyright 2018  Mike Hartl All rights reserved
 * @license   The source code of this document is proprietary work, and is not licensed for distribution or use.
 * @created   13.06.18
 * @version   0.0.1
 */

namespace PublicHolidayInspector\Service;

use Psr\Container\ContainerInterface;
use PublicHolidayInspector\Validator\LastDayValidatorFactory;

/**
 * Class UltimoDayDetermineServiceFactory
 * @package PublicHolidayInspector\Service
 */
class UltimoDayDetermineServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return UltimoDayDetermineService
     */
    public function __invoke(ContainerInterface $container)
    {
        return $this->create($container);
    }

    /**
     * @param ContainerInterface $container
     * @return UltimoDayDetermineService
     */
    public function create(ContainerInterface $container) : UltimoDayDetermineService
    {
        return new UltimoDayDetermineService(
            (new PublicHolidayCalculatorServiceFactory())->create($container),
            new DateService(),
            (new LastDayValidatorFactory())->create($container)
        );
    }


}
