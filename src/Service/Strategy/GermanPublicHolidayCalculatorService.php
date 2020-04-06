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

namespace PublicHolidayInspector\Service\Strategy;

use PublicHolidayInspector\Collection\De\HolidayCollection;
use PublicHolidayInspector\Day\Holiday;
use PublicHolidayInspector\Exception\NotFoundHolidayException;
use PublicHolidayInspector\Interfaces\De\PublicHolidaysConstantsInterface;


/**
 * Class GermanPublicHolidayCalculatorService
 * @package PublicHolidayInspector\Service\Strategy
 */
class GermanPublicHolidayCalculatorService extends AbstractPublicHolidayCalculatorService implements PublicHolidayCalculatorServiceInterface
{
    /**
     * @param \DateTime|null $date
     * @param string         $germanState
     * @return string
     * @throws \Exception
     */
    public function calculate(\DateTime $date = null, string $germanState = '') : string
    {

        $germanState = \strtoupper($germanState);
        if ($date == null) {
            $date = new \DateTime('NOW');
        }

        $year = $date->format('Y');
        $month = $date->format('m');
        $day = $date->format('d');

        $datum_arr = \getdate(
            \mktime(Holiday::DEFAULT_HOUR, Holiday::DEFAULT_MINUTE, Holiday::DEFAULT_SECOND, $month, $day, $year)
        );

        $status = self::DEFAULT_OUTPUT_WORKDAY;
        if ($datum_arr['wday'] == self::WEEK_DAY_SUNDAY || $datum_arr['wday'] == self::WEEK_DAY_SATURDAY) {
            $status = self::DEFAULT_OUTPUT_WEEKEND;
        }

        $changeDate = $day . '.' . $month;

        try {
            return $this->calculateDynamicHolidays($date, $changeDate, $germanState);
        } catch (NotFoundHolidayException $ex) {
            return $status;
        }

    }

    /**
     * @param \DateTime|null $date
     * @param string         $changeDate
     * @param string         $germanState
     * @return string
     * @throws NotFoundHolidayException
     */
    private function calculateDynamicHolidays(\DateTime $date, string $changeDate, string $germanState = '')
    {
        $collection = new HolidayCollection($date);

        /** @var Holiday $result */
        $result = $collection->equal($changeDate);

        $this->federalState($result, $germanState);

        return $result;

    }

    /**
     * @param Holiday $day
     * @param string  $federalState
     * @return void
     * @throws NotFoundHolidayException
     */
    private function federalState(Holiday $day, string $federalState)
    {
        if (
            isset(PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_GERMAN_STATES[(string)$day]) &&
            (\in_array(
                $federalState,
                PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_GERMAN_STATES[(string)$day]
            )) == false) {
            throw new NotFoundHolidayException('Not found a holiday');
        }
    }
}
