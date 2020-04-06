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

namespace PublicHolidayInspector\Validator;

use PublicHolidayInspector\Interfaces\DefaultConstantsInterface;
use PublicHolidayInspector\Service\DateService;
use PublicHolidayInspector\Service\PublicHolidayCalculatorServiceInterface;
use Zend\Validator\Exception;

/**
 * Class LastDayValidator
 * @package PublicHolidayInspector\Validator
 */
class LastDayValidator implements DayValidatorInterface
{
    /**
     * @var PublicHolidayCalculatorServiceInterface
     */
    protected $publicHolidayService;

    /**
     * @var DateService
     */
    protected $dateService;

    /**
     * @var array
     */
    private $messages;

    /**
     * LastDayValidator constructor.
     *
     * @param PublicHolidayCalculatorServiceInterface $publicHolidayService
     * @param DateService                             $dateService
     */
    public function __construct(PublicHolidayCalculatorServiceInterface $publicHolidayService, DateService $dateService)
    {
        $this->publicHolidayService = $publicHolidayService;
        $this->dateService = $dateService;
    }

    /**
     * Returns true if and only if $value meets the validation requirements
     * If $value fails validation, then this method returns false, and
     * getMessages() will return an array of messages that explain why the
     * validation failed.
     * @param \DateTime $dateTime
     * @param string    $state
     * @param string    $country
     * @return bool
     * @throws \Exception
     */
    public function isValid($dateTime, string $state = '', string $country = 'de')
    {
        if ($this->isWorkingDay($dateTime, $state, $country)) {
            $diffLastDayFromDate = $this->dateService->diffToLastDayOfMonth(clone $dateTime);
            if ($diffLastDayFromDate == 0) {
                $this->messages[] = 'The day is the final from month.';
                return true;
            } else {
                $tomorrowDate = clone $dateTime;
                $breakpoint = false;
                while ($breakpoint == false) {
                    $this->dateService->tomorrow($tomorrowDate);
                    if ($result = $this->isWorkingDay($tomorrowDate, $state, $country)) {
                        $breakpoint = true;
                        break;
                    }
                    $diffResult = $this->dateService->diffToLastDayOfMonth($tomorrowDate);
                    $breakpoint = $this->isBreakPoint($tomorrowDate, $state, $country);
                    if ($diffResult == 0 && $breakpoint == false) {
                        break;
                    }
                }
                $this->messages[] = 'The day is the final from month.';
                return $breakpoint == false;
            }
        }

        $this->messages[] = 'The day is not final from month.';
        return false;
    }

    /**
     * @param \DateTime $dateTime
     * @param           $state
     * @param           $country
     * @return bool
     */
    private function isWorkingDay(\DateTime $dateTime, $state, $country): bool
    {
        $result = $this->publicHolidayService->calculate($dateTime, $state, $country);
        return $result == DefaultConstantsInterface::DEFAULT_OUTPUT_WORKDAY;

    }

    /**
     * @param \DateTime $dateTime
     * @return bool
     */
    private function isBreakPoint(\DateTime $dateTime, $state, $country): bool
    {
        return $this->dateService->isLastDayOfMonth($dateTime) &&
            $this->publicHolidayService->calculate($dateTime, $state, $country) ==
            DefaultConstantsInterface::DEFAULT_OUTPUT_WORKDAY;
    }

    /**
     * Returns an array of messages that explain why the most recent isValid()
     * call returned false. The array keys are validation failure message identifiers,
     * and the array values are the corresponding human-readable message strings.
     * If isValid() was never called or if the most recent isValid() call
     * returned true, then this method returns an empty array.
     *
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }
}
