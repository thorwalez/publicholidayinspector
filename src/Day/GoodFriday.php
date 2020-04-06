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
 * Class GoodFriday
 * @package PublicHolidayInspector\Day
 */
class GoodFriday extends EasterSunday
{
    const DAY_NAME = PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_GOOD_FRIDAY;

    const DAY_FACTOR = -2;

}