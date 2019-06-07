<?php

namespace StarGrid\LaravelHolidayCalendar\Parser\Factory;

use StarGrid\LaravelHolidayCalendar\Enum\ResponseTypeEnum;
use StarGrid\LaravelHolidayCalendar\Parser\Contract\ParserInterface;
use StarGrid\LaravelHolidayCalendar\Parser\JsonParser;
use StarGrid\LaravelHolidayCalendar\Parser\XmlParser;
use StarGrid\LaravelHolidayCalendar\Exception\ParserException;

/**
 * Class ParserFactory
 * @package StarGrid\LaravelHolidayCalendar\Parser\Factory
 *
 * @author Gabriel Anhaia <gabriel@stargrid.pro>
 */
class ParserFactory
{
    /**
     * Método responsável por criar uma instância de um determinado parser para converter o retorno da API.
     *
     * @param ResponseTypeEnum $responseTypeEnum
     * @return ParserInterface
     * @throws ParserException
     */
    public function makeParser(ResponseTypeEnum $responseTypeEnum) : ParserInterface
    {
        if ($responseTypeEnum->value() === ResponseTypeEnum::JSON_RESPONSE) {
            return new JsonParser;
        } elseif ($responseTypeEnum->value() === ResponseTypeEnum::XML_RESPONSE) {
            return new XmlParser;
        } else {
            throw new ParserException('Parser not found (invalid response type).');
        }
    }
}