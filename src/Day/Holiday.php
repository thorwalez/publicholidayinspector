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

/**
 * Interface Holiday
 * @package PublicHolidayInspector\Day
 */
interface Holiday
{

    const DEFAULT_HOUR   = 0;
    const DEFAULT_MINUTE = 0;
    const DEFAULT_SECOND = 0;
    const DEFAULT_DAY    = 0;

    /**
     * @param string $changeDate
     * @return boolean
     */
    public function equals($changeDate);

    /**
     * @return string
     */
    public function __toString();

}