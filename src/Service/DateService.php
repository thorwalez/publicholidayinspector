<?php
/**
 * Copyright (c) 2018.
 * Created By
 * @author    Mike Hartl
 * @copyright 2018  Mike Hartl All rights reserved
 * @license   The source code of this document is proprietary work, and is not licensed for distribution or use.
 * @created   13.06.18
 * @version   0.0.1
 */

namespace PublicHolidayInspector\Service;


use PublicHolidayInspector\Day\Holiday;

/**
 * Class DateService
 * @package PublicHolidayInspector\Service
 */
class DateService
{

    /**
     * @param \DateTime $dateTime
     * @return \DateTime
     * @throws \Exception
     */
    public function tomorrow(\DateTime $dateTime)
    {
        return $dateTime->add(new \DateInterval("P1D"));
    }

    /**
     * @param \DateTime $dateTime
     * @return bool
     */
    public function isLastDayOfMonth(\DateTime $dateTime) : bool
    {
        $lastDayOfMonth = $this->giveTheLastDayOfMonth($dateTime);

        return $lastDayOfMonth == $dateTime->format('d');
    }

    /**
     * @param \DateTime $dateTime
     * @return string
     */
    public function giveTheLastDayOfMonth(\DateTime $dateTime)
    {
        $month = ((int)$dateTime->format('m')) + 1;
        $year = (int)$dateTime->format('Y');
        $lastDayOfMonth = \date(
            'd',
            \mktime(
                Holiday::DEFAULT_HOUR,
                Holiday::DEFAULT_MINUTE,
                Holiday::DEFAULT_SECOND,
                $month,
                Holiday::DEFAULT_DAY,
                $year
            )
        );

        return $lastDayOfMonth;
    }

    /**
     * @param \DateTime $dateTime
     * @return bool|\DateInterval
     * @throws \Exception
     */
    public function diffToLastDayOfMonth(\DateTime $dateTime)
    {
        $lastDayOfMonth = $this->giveTheLastDayOfMonth($dateTime);

        return $dateTime->diff(new \DateTime($lastDayOfMonth . '.' . $dateTime->format('m.Y')))->days;
    }

}
