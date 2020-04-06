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

namespace PublicHolidayInspector\Service;

/**
 * Interface PublicHolidayCalculatorServiceInterface
 * @package PublicHolidayInspector\Service
 */
interface PublicHolidayCalculatorServiceInterface
{
    /**
     * @param \DateTime|null $date
     * @param string         $state
     * @param string         $country
     * @return string
     */
    public function calculate(\DateTime $date = null, string $state = '', $country = 'de'): string;
}
