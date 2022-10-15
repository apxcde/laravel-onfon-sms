# Add OnFon SMS to your laravel web application

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require nineafrica/onfon-sms
```

### Publish the config file

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Nineafrica\OnfonSms\OnfonSmsServiceProvider" --tag="onfon-sms-config"
```

This is the contents of the published config file:

```php
return [
    'senderId' => env('ONFON_SMS_SENDER_ID', ''),

    'api_key' => env('ONFON_SMS_API_KEY', ''),

    'client_id' => env('ONFON_SMS_CLIENT_ID', ''),

    'access_key' => env('ONFON_SMS_ACCESS_KEY', ''),
];
```

### Add Environment Variables

Set the variables below in your .env file. You will receive these variables from onfon media

```dotenv
ONFON_SMS_SENDER_ID=""
ONFON_SMS_API_KEY=""
ONFON_SMS_CLIENT_ID=""
ONFON_SMS_ACCESS_KEY=""
```

### Set up the notifiable model

Add the routeNotificationForOnfon method on your notifiable Model. If this is not added, the phone_number field will be automatically used.

```php
<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Route notifications for the OnFon channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForOnfon($notification)
    {
        return $this->phone;
    }
}
```

## Usage

To use this package, you need to create a notification class, like NewsWasPublished from the example below, in your Laravel application. Make sure to check out Laravel's documentation for this process.

```php
<?php

use Nineafrica\OnfonSms\OnfonChannel;
use Nineafrica\OnfonSms\OnfonMessage;

class NewsWasPublished extends Notification
{

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [OnfonChannel::class];
    }

    public function toOnfon($notifiable)
    {
		return (new OnfonMessage())
                    ->content('Your SMS message content');

    }
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you discover any security-related issues, please email erick@nineafrica.com instead of using the issue tracker.

## Credits

- [Nineafrica LTD](https://github.com/nineafrica)
- [All Contributors](../../contributors)
