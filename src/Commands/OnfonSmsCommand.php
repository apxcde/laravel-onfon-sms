<?php

namespace Apxcde\OnfonSms\Commands;

use Illuminate\Console\Command;

class OnfonSmsCommand extends Command
{
    public $signature = 'onfon-sms';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
