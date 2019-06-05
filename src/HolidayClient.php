<?php

namespace StarGrid\LaravelHolidayCalendar;

use GuzzleHttp\Client;

use Psr\Http\Message\ResponseInterface;
use StarGrid\LaravelHolidayCalendar\{Entity\HolidayEntity,
    Enum\ResponseTypeEnum,
    Parser\Contract\ParserInterface,
    Parser\Factory\ParserFactory,
    Parser\JsonParser};

/**
 * Class HolidayClient
 * @package StarGrid\LaravelHolidayCalendar
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class HolidayClient
{
    /** @var Client $guzzleHttp Cliente Http para a integração com a API de feriados. */
    protected $guzzleHttp;

    /** @var ParserInterface $parser Objeto com o formatador de retorno a API. */
    protected $parser;

    /** @var string $baseUrl Url base da API. */
    protected $baseUrl;

    /** @var string $token Token de autorização para utilizar a API. */
    protected $token;

    /**
     * HolidayClient constructor.
     *
     * @param string $baseUrl Url base de comunicação com a API.
     * @param string $token Token de autorização para utilizar a API.
     */
    public function __construct(string $baseUrl, string $token)
    {
        $this->guzzleHttp = new Client;
        $this->baseUrl = $baseUrl;
        $this->token = $token;
    }

    /**
     * @param Client $guzzleHttp
     * @return HolidayClient
     */
    public function setHttpClient(Client $guzzleHttp): HolidayClient
    {
        $this->guzzleHttp = $guzzleHttp;

        return $this;
    }

    /**
     * Método responsável por definir o parser do tipo Json para o retorno da API.
     *
     * @return HolidayClient
     * @throws ParserException
     */
    public function setJsonResponse(): HolidayClient
    {
        $parserFactory = new ParserFactory;

        $this->parser = $parserFactory->makeParser(ResponseTypeEnum::JSON_RESPONSE());

        return $this;
    }

    /**
     * Método responsável por definir o parser do tipo XML para o retorno da API.
     *
     * @return HolidayClient
     * @throws ParserException
     */
    public function setXmlResponse(): HolidayClient
    {
        $parserFactory = new ParserFactory;

        $this->parser = $parserFactory->makeParser(ResponseTypeEnum::XML_RESPONSE());

        return $this;
    }

    /**
     * Método reponsável por buscar os feriados de uma cidade através do nome da cidade e do estado.
     *
     * @param int $year Ano de busca dos feriados.
     * @param string $cityName Nome da cidade a buscar os feriados.
     * @param string $stateName Nome do estado a buscar os feriados.
     *
     * @return HolidayEntity[]
     * @throws ParserException
     */
    public function getHolidaysByCity(int $year, string $cityName, string $stateName)
    {
        if (empty($this->parser)) {
            throw new ParserException(
                'Parser not defined. It is necessary to call the method setJsonResponse() or setXmlResponse() before this action.'
            );
        }

        $queryParams = [
            'token' => $this->token,
            'year' => $year,
            'cidade' => Helper\MainlHelper::normalizeCityName($cityName),
            'state' => strtoupper($stateName)
        ];

        if ($this->parser instanceof JsonParser) {
            $queryParams['json'] = true;
        }

        $url = $this->baseUrl . '?' . http_build_query($queryParams);

        $guzzleResponse = $this->getHolidays($url);

        $rawResponse = $guzzleResponse->getBody()->getContents();

        return $this->parser->parse($rawResponse);
    }

    /**
     * Método reponsável por buscar os feriados de uma cidade através do seu código do IBGE.
     *
     * @param int $year Ano de busca dos feriados.
     * @param string $ibgeCode Código do IBGE usado para consultar os feriados de determinada região.
     *
     * @return HolidayEntity[]
     * @throws ParserException
     */
    public function getHolidaysByIbgeCode(int $year, string $ibgeCode)
    {
        if (empty($this->parser)) {
            throw new ParserException(
                'Parser not defined. It is necessary to call the method setJsonResponse() or setXmlResponse() before this action.'
            );
        }

        $queryParams = [
            'token' => $this->token,
            'year' => $year,
            'ibge' => $ibgeCode
        ];

        if ($this->parser instanceof JsonParser) {
            $queryParams['json'] = true;
        }

        $url = $this->baseUrl . '?' . http_build_query($queryParams);

        $guzzleResponse = $this->getHolidays($url);

        $rawResponse = $guzzleResponse->getBody()->getContents();

        return $this->parser->parse($rawResponse);
    }

    /**
     * Método repsonsável por efetuar a consulta de feriados na API.
     *
     * @param string $apiUrl Url da API já com os parâmetros.
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function getHolidays(string $apiUrl): ResponseInterface
    {
        return $this->guzzleHttp->get($apiUrl);
    }
}