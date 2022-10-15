<?php

namespace Nineafrica\OnfonSms;

use Nineafrica\OnfonSms\Exceptions\InvalidConfiguration;

class BulkSMS
{
    /**
     * @throws InvalidConfiguration
     */
    public static function Send($phone_number, $textMessage): string|bool
    {
        $senderId = config('onfon-sms.senderId');
        $apiKey = config('onfon-sms.api_key');
        $clientId = config('onfon-sms.client_id');
        $accessKey = config('onfon-sms.access_key');

        if (is_null($senderId) || is_null($apiKey) || is_null($clientId) || is_null($accessKey)) {
            throw InvalidConfiguration::configurationNotSet();
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.onfonmedia.co.ke/v1/sms/SendBulkSMS');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_ENCODING, '');
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt(
            $curl,
            CURLOPT_POSTFIELDS,
            '{
            "SenderId": "'. $senderId .'",
            "MessageParameters": [
                {
                "Number": "' . $phone_number . '",
                "Text":"'. $textMessage .'"
                }
            ],
            "ApiKey": "'. $apiKey .'",
            "ClientId": "'. $clientId .'"
            }'
        );
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            [
                "Content-Type: application/json",
                "AccessKey: ". $accessKey,
            ]
        );

        return curl_exec($curl);
    }
}
