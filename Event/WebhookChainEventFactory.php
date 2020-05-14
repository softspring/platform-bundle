<?php

namespace Softspring\PlatformBundle\Event;

use Symfony\Component\HttpFoundation\Request;

class WebhookChainEventFactory
{
    /**
     * @var WebhookEventFactoryInterface[]
     */
    protected $factories;

    /**
     * WebhookEventFactory constructor.
     *
     * @param WebhookEventFactoryInterface[] $factories
     */
    public function __construct($factories)
    {
        $this->factories = $factories;
    }

    public function create(Request $request): ?WebhookEvent
    {
        foreach ($this->factories as $factory) {
            if ($factory->support($request)) {
                return $factory->create($request);
            }
        }

        return null;
    }
}