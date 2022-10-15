<?php

namespace Apxcde\OnfonSms\Exceptions;

class InvalidConfiguration extends \Exception
{
    public static function contentNotSet(): self
    {
        return new static('Notification content not set.');
    }

    public static function configurationNotSet(): self
    {
        return new static('To send notifications via OnFon Media you need to add credentials in the `config file`.');
    }
}
