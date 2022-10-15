<?php

namespace Nineafrica\OnfonSms\Helpers;

class Misc
{
    public static function formatPhoneNumber($phone)
    {
        $phone = (str_starts_with($phone, "+")) ? str_replace("+", "", $phone) : $phone;
        $phone = (str_starts_with($phone, "0")) ? preg_replace("/^0/", "254", $phone) : $phone;

        return (str_starts_with($phone, "7")) ? "254{$phone}" : $phone;
    }
}
