<?php

namespace Nineafrica\OnfonSms;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nineafrica\OnfonSms\OnfonSms
 */
class OnfonSmsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'onfon-sms';
    }
}
