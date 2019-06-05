<?php

namespace StarGrid\LaravelHolidayCalendar\Parser\Contract;

use StarGrid\LaravelHolidayCalendar\Entity\HolidayEntity;

/**
 * Interface ParserInterface
 * @package StarGrid\LaravelHolidayCalendar\Parser
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
interface ParserInterface
{
    /**
     * Método responsável por formatar o retorno da API.
     *
     * @param string $rawResponse
     * @return HolidayEntity[]
     */
    public function parse(string $rawResponse): array;
}