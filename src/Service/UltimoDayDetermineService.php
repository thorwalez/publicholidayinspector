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

use PublicHolidayInspector\Interfaces\DefaultConstantsInterface;
use PublicHolidayInspector\Exception\NotFoundUltimoException;
use PublicHolidayInspector\Validator\LastDayValidator;

/**
 * Class UltimoDayDetermineService
 * @package PublicHolidayInspector\Service
 */
class UltimoDayDetermineService implements DefaultConstantsInterface, UltimoDayDetermineServiceInterface
{
    /**
     * @var PublicHolidayCalculatorService
     */
    protected $mphcService;

    /**
     * @var DateService
     */
    protected $dateService;

    /**
     * @var LastDayValidator
     */
    protected $lastDayValidator;

    /**
     * UltimoDayCalculatorService constructor.
     *
     * @param PublicHolidayCalculatorService $mphcService
     * @param DateService                    $dateService
     * @param LastDayValidator               $lastDayValidator
     */
    public function __construct(
        PublicHolidayCalculatorService $mphcService,
        DateService $dateService,
        LastDayValidator $lastDayValidator
    ) {
        $this->mphcService = $mphcService;
        $this->dateService = $dateService;
        $this->lastDayValidator = $lastDayValidator;
    }


    /**
     * @param \DateTime|null $date
     * @param string         $state
     * @param string         $country |default de
     * @return \DateTime
     * @throws \Exception
     * @throws NotFoundUltimoException
     */
    public function determine(\DateTime $date = null, string $state = '', string $country = 'de'): \DateTime
    {

        if ($this->lastDayValidator->isValid($date, $state, $country)) {
            return $date;
        }
        throw  new NotFoundUltimoException('No Ultimate Date was found');
    }

}
