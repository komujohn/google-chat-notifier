<?php

namespace Symfony\Component\Notifier\Bridge\GoogleChat;


use Symfony\Component\Notifier\Notification\Notification;

class ThreadNotification extends Notification
{


    private $thread_key = '';

    public function __construct(string $subject = '', array $channels = [], $thread_key = '')
    {
        parent::__construct();
        $this->thread_key = $thread_key;

    }

    /**
     * @param string $thread_key
     * @return $this
     */
    public function thread(string $thread_key): self
    {
        $this->thread_key = $thread_key;

        return $this;
    }

    public function getThread(): string
    {
        return $this->thread_key;
    }
}