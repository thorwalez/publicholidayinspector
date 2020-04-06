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
 * Class FirstChristmasDay
 * @package PublicHolidayInspector\Day
 */
class FirstChristmasDay extends EasterSunday
{
    const FIX_PUBLIC_HOLIDAY_1_CHRISTMAS_DAY     = '25.12';
    const DAY_NAME = PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_1_CHRISTMAS_DAY;

    /**
     * @param string $changeDate
     * @return bool
     */
    public function equals($changeDate)
    {
        return $changeDate == self::FIX_PUBLIC_HOLIDAY_1_CHRISTMAS_DAY;
    }
}