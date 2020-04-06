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


use PublicHolidayInspector\Exception\NotFoundUltimoException;

/**
 * Interface UltimoDayDetermineServiceInterface
 * @package PublicHolidayInspector\Service
 */
interface UltimoDayDetermineServiceInterface
{
    /**
     * @param \DateTime|null $date
     * @param string         $state
     * @param string         $country |default de
     * @return \DateTime
     * @throws \Exception
     * @throws NotFoundUltimoException
     */
    public function determine(\DateTime $date = null, string $state = '', string $country = 'de'): \DateTime;
}
