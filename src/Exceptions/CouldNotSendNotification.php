<?php

namespace Apxcde\OnfonSms\Exceptions;

class CouldNotSendNotification extends \Exception
{
    public static function serviceRespondedWithAnError(string $error): self
    {
        return new static("OnFon service responded with an error: { $error }");
    }
}
