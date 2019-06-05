<?php

namespace StarGrid\LaravelHolidayCalendar\Parser\Contract;

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
     * @param $response
     * @return array
     */
    public function parse($response): array;
}