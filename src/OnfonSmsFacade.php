<?php

namespace Apxcde\OnfonSms;

use Illuminate\Support\Facades\Facade;

class OnfonSmsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'onfon-sms';
    }
}
