<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\PlatformBundle\Event\WebhookEvent;
use Symfony\Component\HttpFoundation\Request;

interface NotifyAdapterInterface extends PlatformAdapterInterface
{
    public function createEvent(Request $request): WebhookEvent;
}