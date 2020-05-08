<?php

namespace Softspring\PlatformBundle\Controller;

use Psr\Log\LoggerInterface;
use Softspring\CoreBundle\Controller\AbstractController;
use Softspring\PlatformBundle\Event\WebhookEventFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class WebhookController extends AbstractController
{
    /**
     * @var WebhookEventFactory
     */
    protected $webhookEventFactory;

    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @var LoggerInterface|null
     */
    protected $logger;

    /**
     * WebhookController constructor.
     *
     * @param WebhookEventFactory      $webhookEventFactory
     * @param EventDispatcherInterface $eventDispatcher
     * @param LoggerInterface|null     $logger
     */
    public function __construct(WebhookEventFactory $webhookEventFactory, EventDispatcherInterface $eventDispatcher, ?LoggerInterface $logger)
    {
        $this->webhookEventFactory = $webhookEventFactory;
        $this->eventDispatcher = $eventDispatcher;
        $this->logger = $logger;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function notify(Request $request): Response
    {
        try {
            if ($event = $this->webhookEventFactory->create($request)) {
                $this->eventDispatcher->dispatch($event);
            }

            return new Response('', Response::HTTP_OK);
        } catch (\Exception $e) {
            $this->logger && $this->logger->error($e->getMessage());

            return new Response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}