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

namespace PublicHolidayInspector\Service\Strategy;

use PublicHolidayInspector\Interfaces\DefaultConstantsInterface;

/**
 * Class AbstractPublicHolidayCalculatorService
 * @package PublicHolidayInspector\Service\Strategy
 */
abstract class AbstractPublicHolidayCalculatorService implements DefaultConstantsInterface
{
    const DAY_MONTH_FORMAT = 'd.m';

    const WEEK_DAY_SUNDAY = 0;
    const WEEK_DAY_MONDAY = 1;
    const WEEK_DAY_TUESDAY = 2;
    const WEEK_DAY_WEDNESDAY = 3;
    const WEEK_DAY_THURSDAY = 4;
    const WEEK_DAY_FRIDAY = 5;
    const WEEK_DAY_SATURDAY = 6;

}
