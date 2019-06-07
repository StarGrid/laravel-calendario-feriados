<?php

namespace StarGrid\LaravelHolidayCalendar\Laravel;


use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelHolidayCalendarServiceProvider
 *
 * @package StarGrid\LaravelHolidayCalendar\Laravel
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class LaravelHolidayCalendarServiceProvider extends ServiceProvider
{
    /**
     * Publishes configuration file.
     *
     * @return  void
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../../config/holiday_calendar.php');
        $this->publishes([$path => config_path('holiday_calendar.php')], 'holiday-calendar');
        $this->mergeConfigFrom($path, 'holiday-calendar');
    }

    /**
     * Make config publishment optional by merging the config from the package.
     *
     * @return  void
     */
    public function register()
    {

    }
}