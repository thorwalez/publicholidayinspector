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
 * Class ThreeHolyKings
 * @package PublicHolidayInspector\Day
 */
class ThreeHolyKings extends EasterSunday
{
    const FIX_PUBLIC_HOLIDAY_THREE_HOLY_KINGS    = '06.01';

    const DAY_NAME = PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_THREE_HOLY_KINGS;

    /**
     * @param string $changeDate
     * @return bool
     */
    public function equals($changeDate)
    {
        return $changeDate == self::FIX_PUBLIC_HOLIDAY_THREE_HOLY_KINGS;
    }
}