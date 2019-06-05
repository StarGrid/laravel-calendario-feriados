<?php

namespace StarGrid\LaravelHolidayCalendar\Parser;

use StarGrid\LaravelHolidayCalendar\Entity\HolidayEntity;
use StarGrid\LaravelHolidayCalendar\Enum\HolidayTypeEnum;
use StarGrid\LaravelHolidayCalendar\Parser\Contract\ParserInterface;

/**
 * Class JsonParser
 * @package StarGrid\LaravelHolidayCalendar\Parser
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class JsonParser implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse(string $rawResponse): array
    {
        $holidays = json_decode($rawResponse, true);

        $formattedResponse = [];

        foreach ($holidays as $holiday) {
            $holidayType = (int) $holiday['type_code'];

            $formattedResponse[] = new HolidayEntity(
                \DateTime::createFromFormat('d/m/Y', $holiday['date']),
                $holiday['name'],
                $holiday['description'],
                $holiday['link'],
                HolidayTypeEnum::memberByValue($holidayType),
                $holiday['type'],
                json_encode($holiday)
            );
        }

        return $formattedResponse;
    }
}