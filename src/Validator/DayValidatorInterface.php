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

/**
 * Interface DayValidatorInterface
 * @package PublicHolidayInspector\Validator
 */
interface DayValidatorInterface
{
    /**
     * @param \DateTime $dateTime
     * @return bool
     */
    public function isValid($dateTime);
}
