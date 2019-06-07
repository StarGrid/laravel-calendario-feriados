<?php

/**
 * Configurações padrão da intregração com http://www.calendario.com.br/api_feriados_municipais_estaduais_nacionais.php
 */
return [
    'token' => env('LARAVEL_HOLIDAY_CALENDAR_TOKEN', ''),

    'url_api' => env('LARAVEL_HOLIDAY_CALENDAR_URL_API', 'https://api.calendario.com.br')
];