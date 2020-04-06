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

namespace PublicHolidayInspector\Collection\De;

use PublicHolidayInspector\Day\AllSaintsDay;
use PublicHolidayInspector\Day\AscensionDay;
use PublicHolidayInspector\Day\ChristmasEve;
use PublicHolidayInspector\Day\CorpusChristi;
use PublicHolidayInspector\Day\DayOfGermanUnity;
use PublicHolidayInspector\Day\DayOfPrayerAndRepentance;
use PublicHolidayInspector\Day\EasterMonday;
use PublicHolidayInspector\Day\EasterSunday;
use PublicHolidayInspector\Day\FirstChristmasDay;
use PublicHolidayInspector\Day\GoodFriday;
use PublicHolidayInspector\Day\Holiday;
use PublicHolidayInspector\Day\LaborDay;
use PublicHolidayInspector\Day\MaryAscension;
use PublicHolidayInspector\Day\NewYear;
use PublicHolidayInspector\Day\NewYearsEve;
use PublicHolidayInspector\Day\ReformationDay;
use PublicHolidayInspector\Day\SecondChristmasDay;
use PublicHolidayInspector\Day\ThreeHolyKings;
use PublicHolidayInspector\Day\WhitMonday;
use PublicHolidayInspector\Day\WhitSunday;
use PublicHolidayInspector\Exception\NotFoundHolidayException;

/**
 * Class HolidayCollection
 * @package PublicHolidayInspector\Collection
 */
class HolidayCollection
{

    /** @var Holiday[] $holidays */
    private $holidays;

    /**
     * HolidayCollection constructor.
     * @param \DateTime $date
     */
    public function __construct(\DateTime $date)
    {
        $this->holidays = [
            new AllSaintsDay($date),
            new AscensionDay($date),
            new ChristmasEve($date),
            new CorpusChristi($date),
            new DayOfGermanUnity($date),
            new DayOfPrayerAndRepentance($date),
            new EasterMonday($date),
            new EasterSunday($date),
            new FirstChristmasDay($date),
            new GoodFriday($date),
            new LaborDay($date),
            new MaryAscension($date),
            new NewYear($date),
            new NewYearsEve($date),
            new ReformationDay($date),
            new SecondChristmasDay($date),
            new ThreeHolyKings($date),
            new WhitMonday($date),
            new WhitSunday($date),
        ];
    }

    /**
     * @param string $changeDate
     * @return Holiday
     * @throws NotFoundHolidayException
     */
    public function equal($changeDate)
    {
        /** @var Holiday $holiday */
        foreach ($this->holidays as $holiday) {
            if ($holiday->equals($changeDate)) {
                return $holiday;
            }
        }
        throw new NotFoundHolidayException('Not found a holiday');
    }
}