<?php

namespace StarGrid\LaravelHolidayCalendar\Parser;

use StarGrid\LaravelHolidayCalendar\Entity\HolidayEntity;
use StarGrid\LaravelHolidayCalendar\Enum\HolidayTypeEnum;
use StarGrid\LaravelHolidayCalendar\Parser\Contract\ParserInterface;

/**
 * Class XmlParser
 * @package StarGrid\LaravelHolidayCalendar\Parser
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class XmlParser implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse(string $rawResponse): array
    {
        $holidays = simplexml_load_string($rawResponse);

        $formattedResponse = [];

        foreach ($holidays->event as $holiday) {
            $holidayType = (int) $holiday->type_code;

            $formattedResponse[] = new HolidayEntity(
                \DateTime::createFromFormat('d/m/Y', $holiday->date),
                $holiday->name,
                $holiday->description,
                $holiday->link,
                HolidayTypeEnum::memberByValue($holidayType),
                $holiday->type,
                json_encode($holiday)
            );
        }

        return $formattedResponse;
    }
}