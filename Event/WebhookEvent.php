<?php

namespace Softspring\PlatformBundle\Event;

use Symfony\Contracts\EventDispatcher\Event;

class WebhookEvent extends Event
{
    /**
     * @var string
     */
    protected $platform;

    /**
     * @var string
     */
    protected $eventName;

    /**
     * @var mixed
     */
    protected $platformData;

    /**
     * WebhookEvent constructor.
     *
     * @param string $platform
     * @param string $eventName
     * @param mixed  $platformData
     */
    public function __construct(string $platform, string $eventName, $platformData)
    {
        $this->platform = $platform;
        $this->eventName = $eventName;
        $this->platformData = $platformData;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->eventName;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->platformData;
    }
}