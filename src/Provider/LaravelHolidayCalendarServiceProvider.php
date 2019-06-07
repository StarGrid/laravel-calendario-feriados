<?php

namespace StarGrid\LaravelHolidayCalendar\Provider;

use Illuminate\Support\ServiceProvider;
use StarGrid\LaravelHolidayCalendar\Exception\ConfigurationException;
use StarGrid\LaravelHolidayCalendar\HolidayClient;

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
        $this->app->bind(HolidayClient::class, function ($app) {
            $urlApi = config('holiday-calendar.url_api');
            $token = config('holiday-calendar.token');

            if (empty($urlApi)) {
                throw new ConfigurationException('Url not defined (LARAVEL_HOLIDAY_CALENDAR_URL_API)');
            }

            if (empty($token)) {
                throw new ConfigurationException('Token not defined (LARAVEL_HOLIDAY_CALENDAR_URL_API)');
            }

            $holidayClient = new HolidayClient(
                $urlApi,
                $token
            );

            return $holidayClient;
        });
    }
}