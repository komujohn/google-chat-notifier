Google Chat Notifier
====================

Provides Google Chat integration for Symfony Notifier. 
Allowing the thread key to be setup at the notification

DSN example
-----------

```
GOOGLE_CHAT_DSN=googlechat://ACCESS_KEY:ACCESS_TOKEN@default/SPACE?thread_key=THREAD_KEY
```

where:
 - `ACCESS_KEY` is your Google Chat access key
 - `ACCESS_TOKEN` is your Google Chat access token
 - `SPACE` is the Google Chat space
 - `THREAD_KEY` is the Google Chat message thread to group messages into a single thread (optional)


Code Example
-----------

```
<?php
namespace App\Service;

use Symfony\Component\Notifier\Bridge\GoogleChat\ThreadNotification;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\NoRecipient;


class NotificationHelper {

    private NotifierInterface $notifier;

    public function __construct( NotifierInterface $notifier ) {
        $this->notifier    = $notifier;
    }
    public function sendNotification($subject,$message,$thread_key='general5'){
        $notification = (new ThreadNotification())
            ->subject($subject)
            ->content($message)
            ->thread($thread_key)
            ->importance(Notification::IMPORTANCE_HIGH);

        $this->notifier->send($notification, new NoRecipient());
    }

}
```

Resources
---------

  * [Contributing](https://symfony.com/doc/current/contributing/index.html)
  * [Report issues](https://github.com/symfony/symfony/issues) and
    [send Pull Requests](https://github.com/symfony/symfony/pulls)
    in the [main Symfony repository](https://github.com/symfony/symfony)
