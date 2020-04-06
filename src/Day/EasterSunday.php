<?php
/**
 * Copyright (c) 2019.
 * Created By
 * @author    Mike Hartl
 * @copyright 2019  Mike Hartl All rights reserved
 * @license   The source code of this document is proprietary work, and is not licensed for distribution or use.
 * @created   25.12.2019
 * @version   0.0.1
 */

namespace PublicHolidayInspector\Day;


use PublicHolidayInspector\Interfaces\De\PublicHolidaysConstantsInterface;

/**
 * Class Easter
 * @package PublicHolidayInspector\Day
 */
class EasterSunday implements Holiday
{
    const DAY_NAME = PublicHolidaysConstantsInterface::PUBLIC_HOLIDAY_NAME_EASTER_SUNDAY;

    const DAY_MONTH_FORMAT = 'd.m';
    const DAY_FACTOR = 0;

    /** @var string */
    private $easterDay;

    /** @var string */
    private $easterMonth;

    /** @var string */
    protected $easterYear;

    /**
     * Easter constructor.
     * @param \DateTime $date
     */
    public function __construct(\DateTime $date)
    {
        $this->easterYear = $date->format('Y');
        $this->easterDay = \date("d", \easter_date($this->easterYear));
        $this->easterMonth = \date("m", \easter_date($this->easterYear));
    }

    /**
     * @param int $factor
     * @return false|string
     */
    private function getDay(int $factor)
    {
        return \date(
            self::DAY_MONTH_FORMAT,
            \mktime(
                self::DEFAULT_HOUR,
                self::DEFAULT_MINUTE,
                self::DEFAULT_SECOND,
                $this->easterMonth,
                $this->easterDay + $factor,
                $this->easterYear
            )
        );
    }

    /**
     * @param string $changeDate
     * @return boolean
     */
    public function equals($changeDate)
    {
        return $changeDate == $this->getDay(static::DAY_FACTOR);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return static::DAY_NAME;
    }

}