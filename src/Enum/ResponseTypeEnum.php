<?php

namespace StarGrid\LaravelHolidayCalendar\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * Class ResponseTypeEnum
 * @package StarGrid\LaravelHolidayCalendar\Api
 *
 * @method static $this JSON_RESPONSE()
 * @method static $this XML_RESPONSE()
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ResponseTypeEnum extends AbstractEnumeration
{
    /** @var string JSON_RESPONSE Tipo de resposta em formato Json. */
    const JSON_RESPONSE = 'json';

    /** @var string XML_RESPONSE Tipo de resposta em forma XML. */
    const XML_RESPONSE = 'xml';
}