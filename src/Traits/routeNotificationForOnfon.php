<?php

namespace Apxcde\OnfonSms\Traits;

use Apxcde\OnfonSms\Helpers\Misc;

trait routeNotificationForOnfon
{
    public function routeNotificationForOnfon()
    {
        return Misc::formatPhoneNumber($this->phone_number);
    }
}
