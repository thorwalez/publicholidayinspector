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

use PublicHolidayInspector\Day\EasterSunday;
use PublicHolidayInspector\Interfaces\De\PublicHolidaysConstantsInterface;

/**
 * Class WhitSunday
 * @package src\Day
 */
class WhitSunday extends EasterSunday
{
    const DAY_NAME = PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_WHITSUNDAY;

    const DAY_FACTOR = +49;

}