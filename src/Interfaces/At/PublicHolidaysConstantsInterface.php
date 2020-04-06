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


namespace PublicHolidayInspector\Interfaces\At;

/**
 *    BGL   = Burgenland<br>
 *    KTN   = Kärnten<br>
 *    NOE   = Niederösterreich<br>
 *    OOE   = Oberösterreich<br>
 *    SBG   = Salzburg<br>
 *    STMK  = Steiermark<br>
 *    T     = Tirol<br>
 *    VBG   = Vorarlberg<br>
 *    W     = Wien
 */

/**
 * Interface PublicHolidaysConstantsInterface
 * @package PublicHolidayInspector\Interfaces\At
 */
interface PublicHolidaysConstantsInterface extends \PublicHolidayInspector\Interfaces\De\PublicHolidaysConstantsInterface
{
    const PUBLIC_HOLIDAY_NAME_JOSEF             = 'Josef';
    const PUBLIC_HOLIDAY_NAME_FLORIAN           = 'Florian';
    const PUBLIC_HOLIDAY_NAME_STAAT_HOLIDAY     = 'Staatsfeiertag';
    const PUBLIC_HOLIDAY_NAME_RUPERT            = 'Rupert';
    const PUBLIC_HOLIDAY_NAME_DAY_OF_REFERENDUM = 'Tag der Volksabstimmung';
    const PUBLIC_HOLIDAY_NAME_NATIONAL_HOLIDAY  = 'Nationalfeiertag';
    const PUBLIC_HOLIDAY_NAME_MARTINS_DAY       = 'Martinstag';
    const PUBLIC_HOLIDAY_NAME_LEOPOLDI_DAY      = 'Leopolditag';
    const PUBLIC_HOLIDAY_NAME_MARY_CONCEPTION   = 'Mariä Empfangnis';


    const PUBLIC_HOLIDAY_AUSTRIA_STATES = [
        self::PUBLIC_HOLIDAY_NAME_JOSEF             => ['KTN', 'STMK', 'T', 'VBG'],
        self::PUBLIC_HOLIDAY_NAME_FLORIAN           => ['OOE'],
        self::PUBLIC_HOLIDAY_NAME_RUPERT            => ['STMK'],
        self::PUBLIC_HOLIDAY_NAME_DAY_OF_REFERENDUM => ['KTN'],
        self::PUBLIC_HOLIDAY_NAME_MARTINS_DAY       => ['BGL'],
        self::PUBLIC_HOLIDAY_NAME_LEOPOLDI_DAY      => ['NOE', 'W'],
    ];
}
