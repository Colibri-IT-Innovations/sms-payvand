# Payvand-sms package for Laravel
Пакет для подключение смс рассылки от пайванда с Laravel 
## Установка

```bash
 composer require livo/sms-payvand
```
## Опубликовать настройки

```bash
 php artisan vendor:publish --provider="Livo\\SMSPayvand\\Providers\\PayvandServiceProvider" --tag=payvand-config
```
## Настройки
Для настройки пакета мы должны вводить данные в файле .env
```bash

PAYVAND_API_KEY=5E8C9512-AF2E-4413-BEF8-F4B7E5BE4897

PAYVAND_LOCAL=EN

PAYVAND_SOURCE_ADDRESS=some_address


```

## Миграции
```bash
 php artisan migrate
```

## Использование
```bash
use Livo\SMSPayvand\Events\SendedSms;

event(new SendedSms('902222900', 'Привет это тестовый смс'));

```

## Логирование
```bash
use Livo\SMSPayvand\Models\SmsLog;

$logs = SmsLog::latest()->paginate();

```
