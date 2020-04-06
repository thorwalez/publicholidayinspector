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

namespace PublicHolidayInspector\Collection\At;

use PublicHolidayInspector\Day\AllSaintsDay;
use PublicHolidayInspector\Day\AscensionDay;
use PublicHolidayInspector\Day\ChristmasEve;
use PublicHolidayInspector\Day\CorpusChristi;
use PublicHolidayInspector\Day\DayOfReferendum;
use PublicHolidayInspector\Day\EasterMonday;
use PublicHolidayInspector\Day\EasterSunday;
use PublicHolidayInspector\Day\FirstChristmasDay;
use PublicHolidayInspector\Day\Florian;
use PublicHolidayInspector\Day\Holiday;
use PublicHolidayInspector\Day\Josef;
use PublicHolidayInspector\Day\LeopoldiDay;
use PublicHolidayInspector\Day\MartinsDay;
use PublicHolidayInspector\Day\MaryAscension;
use PublicHolidayInspector\Day\MaryConception;
use PublicHolidayInspector\Day\NationalHoliday;
use PublicHolidayInspector\Day\NewYear;
use PublicHolidayInspector\Day\Rubert;
use PublicHolidayInspector\Day\SecondChristmasDay;
use PublicHolidayInspector\Day\StaatHoliday;
use PublicHolidayInspector\Day\ThreeHolyKings;
use PublicHolidayInspector\Day\WhitMonday;
use PublicHolidayInspector\Day\WhitSunday;
use PublicHolidayInspector\Exception\NotFoundHolidayException;

/**
 * Class HolidayCollection
 * @package PublicHolidayInspector\Collection\At
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
            new EasterSunday($date),
            new EasterMonday($date),
            new AscensionDay($date),
            new WhitSunday($date),
            new WhitMonday($date),
            new CorpusChristi($date),
            new ThreeHolyKings($date),
            new MaryAscension($date),
            new AllSaintsDay($date),
            new ChristmasEve($date),
            new FirstChristmasDay($date),
            new SecondChristmasDay($date),
            new NewYear($date),
            new MaryConception($date),
            new LeopoldiDay($date),
            new MartinsDay($date),
            new NationalHoliday($date),
            new StaatHoliday($date),
            new DayOfReferendum($date),
            new Rubert($date),
            new Florian($date),
            new Josef($date),
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