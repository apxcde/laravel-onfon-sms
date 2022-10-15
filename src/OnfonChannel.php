<?php

namespace Apxcde\OnfonSms;

use Illuminate\Notifications\Notification;
use Apxcde\OnfonSms\Exceptions\CouldNotSendNotification;
use Apxcde\OnfonSms\Exceptions\InvalidConfiguration;
use Apxcde\OnfonSms\Helpers\Misc;

class OnfonChannel
{
    /**
     * Send the given notification via Onfon Media
     * @throws InvalidConfiguration|CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toOnFon($notifiable);
        $phone_number = $notifiable->routeNotificationFor('OnFon') ?? Misc::formatPhoneNumber($notifiable->phone_number);
        $text_message = $message->getContent() ?? throw InvalidConfiguration::contentNotSet();

        try {
            BulkSMS::Send(phone_number: $phone_number, textMessage: $text_message);
        } catch (\Exception $e) {
            throw CouldNotSendNotification::serviceRespondedWithAnError($e->getMessage());
        }
    }
}
