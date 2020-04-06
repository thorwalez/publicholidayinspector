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

namespace PublicHolidayInspector\Interfaces\De;

/**
 * BW = Baden-Württemberg<br>
 * BY = Bayern<br>
 * BE = Berlin<br>
 * BB = Brandenburg<br>
 * HB = Bremen<br>
 * HH = Hamburg<br>
 * HE = Hessen<br>
 * MV = Mecklenburg-Vorpommern<br>
 * NI = Niedersachsen<br>
 * NW = Nordrhein-Westfalen<br>
 * RP = Rheinland-Pfalz<br>
 * SL = Saarland<br>
 * SN = Sachsen<br>
 * ST = Sachsen-Anhalt<br>
 * SH = Schleswig-Holstein<br>
 * TH = Thüringen
 */


/**
 * Interface PublicHolidaysConstantsInterface
 * @package PublicHolidayInspector\Interfaces\De
 */
interface PublicHolidaysConstantsInterface
{

    const PUBLIC_HOLIDAY_NAME_NEW_YEAR                     = 'Neujahr';
    const PUBLIC_HOLIDAY_NAME_THREE_HOLY_KINGS             = 'Heiligen drei Könige';
    const PUBLIC_HOLIDAY_NAME_GOOD_FRIDAY                  = 'Karfreitag';
    const PUBLIC_HOLIDAY_NAME_EASTER_MONDAY                = 'Ostermontag';
    const PUBLIC_HOLIDAY_NAME_EASTER_SUNDAY                = 'Ostersonntag';
    const PUBLIC_HOLIDAY_NAME_LABOR_DAY                    = 'Erster Mai';
    const PUBLIC_HOLIDAY_NAME_ASCENSION_DAY                = 'Christi Himmelfahrt';
    const PUBLIC_HOLIDAY_NAME_WHITSUNDAY                   = 'Pfingstsonntag';
    const PUBLIC_HOLIDAY_NAME_WHITMONDAY                   = 'Pfingstmontag';
    const PUBLIC_HOLIDAY_NAME_CORPUS_CHRISTI               = 'Fronleichnam';
    const PUBLIC_HOLIDAY_NAME_MARY_ASCENSION               = 'Mariä Himmelfahrt';
    const PUBLIC_HOLIDAY_NAME_DAY_OF_GERMAN_UNITY          = 'Tag der deutschen Einheit';
    const PUBLIC_HOLIDAY_NAME_REFORAMTION_DAY              = 'Reformationstag';
    const PUBLIC_HOLIDAY_NAME_HALLOWEEN                    = 'Halloween';
    const PUBLIC_HOLIDAY_NAME_ALL_SAINTS_DAY               = 'Allerheiligen';
    const PUBLIC_HOLIDAY_NAME_DAY_OF_PRAYER_AND_REPENTANCE = 'Buß- und Bettag';
    const PUBLIC_HOLIDAY_NAME_CHRISTMAS_EVE                = 'Heiliger Abend (Bankfeiertag)';
    const PUBLIC_HOLIDAY_NAME_1_CHRISTMAS_DAY              = '1. Weihnachtstag';
    const PUBLIC_HOLIDAY_NAME_2_CHRISTMAS_DAY              = '2. Weihnachtstag';
    const PUBLIC_HOLIDAY_NAME_NEW_YEARS_EVE                = 'Silvester (Bankfeiertag)';

    const PUBLIC_HOLIDAY_GERMAN_STATES = [
        self::PUBLIC_HOLIDAY_NAME_THREE_HOLY_KINGS             => ['BW', 'BY', 'ST'],
        self::PUBLIC_HOLIDAY_NAME_ALL_SAINTS_DAY               => ['BW', 'BY', 'NW', 'RB', 'SL'],
        self::PUBLIC_HOLIDAY_NAME_CORPUS_CHRISTI               => ['BW', 'BY', 'HE', 'NW', 'RP', 'SL', 'SN', 'TH'],
        self::PUBLIC_HOLIDAY_NAME_MARY_ASCENSION               => ['SL', 'BY'],
        self::PUBLIC_HOLIDAY_NAME_DAY_OF_PRAYER_AND_REPENTANCE => ['SN'],
        self::PUBLIC_HOLIDAY_NAME_REFORAMTION_DAY              => ['BB', 'MV', 'SN', 'ST', 'TH'],

    ];


}
