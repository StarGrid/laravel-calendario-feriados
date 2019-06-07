<?php

namespace StarGrid\LaravelHolidayCalendar\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class HolidayClientFacade
 *
 * @package StarGrid\LaravelHolidayCalendar\Facade
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class HolidayClientFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'holiday_calendar_client';
    }
}