<?php

return [

    /*
    | Ключ API для авторизация с payvand
    */
    'api_key' => env('PAYVAND_API_KEY'),

    /*
    | Язык для ответов от сервера payvand
    */
    'local' => env('PAYVAND_LOCAL', 'EN'),

    /*
    |  Адрес источника, которая регистрирует во время договора (это заголовка для писем )
    */
    'source_address' => env('PAYVAND_SOURCE_ADDRESS')


];
