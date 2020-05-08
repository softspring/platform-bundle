<?php

namespace Softspring\PlatformBundle\Event;

use Symfony\Component\HttpFoundation\Request;

interface WebhookEventFactoryInterface
{
    public function support(Request $request): bool;

    public function create(Request $request): WebhookEvent;
}