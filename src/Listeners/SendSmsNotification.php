<?php

namespace Livo\SMSPayvand\Listeners;

use GuzzleHttp\Client;
use Livo\SMSPayvand\Models\SmsLog;
use Livo\SMSPayvand\Events\SendedSms;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSmsNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendedSms  $event
     * @return void
     */
    public function handle(SendedSms $event)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.mdo.payvand.tj/payments/SendMessage',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                [
                    "source-address" =>  config('payvand.source_address'),
                    "destination-address" =>  $event->destination_address,
                    "data-encoding" =>  1,
                    "txn-id" =>  rand(1000000000, 9999999999999),
                    "message" =>  $event->message
                ]
            ]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Api-Key:'.config('payvand.api_key'),
                'Locale:'.config('payvand.local')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        SmsLog::create(['phone' => $event->destination_address, 'message' => $event->message, 'response' => $response]);
    }
}
