<?php

namespace StarGrid\LaravelHolidayCalendar\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * Class HolidayTypeEnum
 * @package StarGrid\LaravelHolidayCalendar\Enum
 *
 * @method static $this NATIONAL()
 * @method static $this STATE()
 * @method static $this MUNICIPAL()
 * @method static $this OPTIONAL()
 *
 * @author Gabriel Anhaia <gabriel@stargrid.pro>
 */
class HolidayTypeEnum extends AbstractEnumeration
{
    /** @var int NATIONAL Feriado nacional. */
    const NATIONAL = 1;

    /** @var int STATE Feriado estadual. */
    const STATE = 2;

    /** @var int MUNICIPAL Feriado municipal. */
    const MUNICIPAL = 3;

    /** @var int OPTIONAL Feriado facultativo. */
    const OPTIONAL = 9;
}