[![Build Status](https://travis-ci.org/stargrid/laravel-calendario-feriados.svg?branch=master)](https://travis-ci.org/stargrid/laravel-calendario-feriados)

# Calendário nacional de feriados.

Este projeto foi iniciado pela [StarGrid](https://stargrid.pro) para ajudar os usuários do Laravel que pretendem integrar seus sistemas com a API [http://www.calendario.com.br](http://www.calendario.com.br) para busca de feriados nacionais, estaduais e municipais.

## Instalação

Para instalar a dependência através do composer, através do terminal, entre na pasta de seu projeto (Laravel) e digite:

```sh
$ composer require stargrid/laravel-calendario-feriados
```

Após a instalação do pacote, execute o próximo comando:
```sh
$ php artisan vendor:publish --provider="StarGrid\LaravelHolidayCalendar\Provider\LaravelHolidayCalendarServiceProvider"
```

Agora é necessário configurar no ```.env``` o seu *token* de acesso da API:
```env
LARAVEL_HOLIDAY_CALENDAR_TOKEN=SEU_TOKEN_AQUI
```

## Utilização

Para utilizar basta primeiramente instânciar a classe `StarGrid\LaravelHolidayCalendar\HolidayClient` conforme o exemplo a seguir:
```php
$holidayClient = new StarGrid\LaravelHolidayCalendar\HolidayClient(env('LARAVEL_HOLIDAY_CALENDAR_TOKEN'));
```

Antes de efetuar as chamadas da API, é necessário definir o tipo de retorno (Response). A [API Calendário](http://www.calendario.com.br/api_feriados_municipais_estaduais_nacionais.php) permite dois formatos, **JSON** ou **XML**.

Para definir o retorno do tipo **JSON**: 
```php
$holidayClient = new StarGrid\LaravelHolidayCalendar\HolidayClient(env('LARAVEL_HOLIDAY_CALENDAR_TOKEN'));
$holidayClient->setJsonResponse();
```
Para definir o retorno do tipo **XML**:
```php
$holidayClient = new StarGrid\LaravelHolidayCalendar\HolidayClient(env('LARAVEL_HOLIDAY_CALENDAR_TOKEN'));
$holidayClient->setXmlResponse();
```

Finalmente para fazer a chamada da API, exitem dois tipos de consultas.

#### Consulta através do código do IBGE do município:
```php
$response = $client->setJsonResponse()
            ->getHolidaysByIbgeCode(2019, 4314902);
```
- O primeiro parâmetro é o ano para a consulta dos feriados.
- O segundo parâmetro é o código do IBGE.

#### Consulta através do nome do município:
```php
$response = $client->setJsonResponse()
            ->getHolidaysByCity(2019, 'Porto Alégre' , 'RS');
```
- O primeiro parâmetro é o ano para a consulta dos feriados.
- O segundo parâmetro é o nome da cidade a ser consultada.
- O terceiro parâmetro é a sigla do estado (UF).

Obs: Não é necessário se preocupar com os acentos e letras minúsculas ou maiúsculas, este tratamento é feito diretamente pelo pacote.

___

No final o resultado será um array de objetos ```StarGrid\LaravelHolidayCalendar\Entity\HolidayEntity```.

## Service-Provider e Facade

É possível utilizar o DI do próprio Laravel para se obter uma instância de `StarGrid\LaravelHolidayCalendar\HolidayClient`, se você estiver em uma controller, por exemplo:
```php
<?php

namespace App\Http\Controllers;

use StarGrid\LaravelHolidayCalendar\HolidayClient;

class HomeController
{
    public function testMethod(HolidayClient $holidayClient)
    {
        $response = $holidayClient->setJsonResponse()
                    ->getHolidaysByCity(2019, 'Porto Alégre' , 'RS');    
    }
}
```

Ou utiliza-lo através do *Facade* do próprio pacote:
```php
<?php

namespace App\Http\Controllers;

use StarGrid\LaravelHolidayCalendar\Facade\HolidayClientFacade;

class HomeController
{
    public function testMethod()
    {
        $response = HolidayClientFacade::setJsonResponse()
                    ->getHolidaysByCity(2019, 'Porto Alégre' , 'RS');    
    }
}
```
