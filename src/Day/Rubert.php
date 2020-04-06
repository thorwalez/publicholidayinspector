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


use PublicHolidayInspector\Interfaces\At\PublicHolidaysConstantsInterface;

/**
 * Class Rubert
 * @package PublicHolidayInspector\Day
 */
class Rubert extends EasterSunday
{
    const FIX_PUBLIC_HOLIDAY_RUPERT = '24.09';

    const DAY_NAME = PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_RUPERT;

    /**
     * @param string $changeDate
     * @return bool
     */
    public function equals($changeDate)
    {
        return $changeDate == self::FIX_PUBLIC_HOLIDAY_RUPERT;
    }
}