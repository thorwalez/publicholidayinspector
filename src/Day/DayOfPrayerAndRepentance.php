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

namespace PublicHolidayInspector\Day;

use PublicHolidayInspector\Interfaces\De\PublicHolidaysConstantsInterface;

/**
 * Class DayOfPrayerAndRepentance
 * @package PublicHolidayInspector\Day
 */
class DayOfPrayerAndRepentance extends EasterSunday
{
    const DAY_MONTH_FORMAT = 'd.m';
    const DAY_NAME = PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_DAY_OF_PRAYER_AND_REPENTANCE;

    const DEFAULT_DAY = 23;

    const DEFAULT_MONTH = 11;

    const LAST_WEDNESDAY = "last Wednesday";

    /**
     * @param string $changeDate
     * @return bool
     */
    public function equals($changeDate)
    {
        return $changeDate == $this->getDayOfPrayerAndRepentance($this->easterYear);
    }

    /**
     * @param int $year
     * @return string
     */
    private function getDayOfPrayerAndRepentance(int $year)
    {
        return \date(
            self::DAY_MONTH_FORMAT,
            \strtotime(
                self::LAST_WEDNESDAY,
                \mktime(
                    self::DEFAULT_HOUR,
                    self::DEFAULT_MINUTE,
                    self::DEFAULT_SECOND,
                    self::DEFAULT_MONTH,
                    self::DEFAULT_DAY,
                    $year
                )
            )
        );
    }
}