<?php

namespace StarGrid\LaravelHolidayCalendar\Parser\Factory;

use PHPUnit\Framework\TestCase;

use StarGrid\LaravelHolidayCalendar\{
    Helper\MainlHelper
};

/**
 * Class MainHelperTest
 * @package StarGrid\LaravelHolidayCalendar\Helper
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class MainHelperTest extends TestCase
{
    /**
     * Testa sucesso ao contruir uma parser to tipo Json.
     *
     * @param string $cityName Nome da cidade a ser formatado.
     * @param string $expectedResult Resultado do nome da cidade após a formatação.
     *
     * @dataProvider normalizeCityNameDataProvider
     */
    public function testNormalizeCityName(string $cityName, string $expectedResult)
    {
        $result = MainlHelper::normalizeCityName($cityName);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * Provedor de dados para os testes de normalização de nomes de cidades.
     *
     * @return array
     */
    public function normalizeCityNameDataProvider()
    {
        return [
            [
                'cityName' => 'porto alégRe',
                'expectedResult' => 'Porto_Alegre'
            ],
            [
                'cityName' => 'Canoas',
                'expectedResult' => 'Canoas'
            ],
            [
                'cityName' => 'são sEbAstiãO DO CAÍ ',
                'expectedResult' => 'Sao_Sebastiao_Do_Cai'
            ],
            [
                'cityName' => '  cAchoeirinha',
                'expectedResult' => 'Cachoeirinha'
            ],
            [
                'cityName' => '    sãOPaulo  -',
                'expectedResult' => 'Saopaulo_-'
            ],
        ];
    }
}