<?php

namespace Nineafrica\OnfonSms\Traits;

use Nineafrica\OnfonSms\Helpers\Misc;

trait routeNotificationForOnfon
{
    public function routeNotificationForOnfon()
    {
        return Misc::formatPhoneNumber($this->phone_number);
    }
}
