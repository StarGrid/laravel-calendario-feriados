<?php

namespace StarGrid\LaravelHolidayCalendar\Api;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * Class ResponseTypeEnum
 * @package StarGrid\LaravelHolidayCalendar\Api
 *
 * @method JSON_RESPONSE() self
 * @method XML_RESPONSE() self
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