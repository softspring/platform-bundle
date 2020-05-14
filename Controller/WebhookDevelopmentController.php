<?php

namespace Softspring\PlatformBundle\Controller;

use Softspring\CoreBundle\Controller\AbstractController;
use Softspring\PlatformBundle\Provider\CredentialsProviderInterface;
use Softspring\PlatformBundle\Stripe\Client\StripeCredentials;
use Stripe\Webhook;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class WebhookDevelopmentController extends AbstractController
{
    /**
     * @var CredentialsProviderInterface
     */
    protected $credentialsProvider;

    /**
     * WebhookDevelopmentController constructor.
     *
     * @param CredentialsProviderInterface $credentialsProvider
     */
    public function __construct(CredentialsProviderInterface $credentialsProvider)
    {
        $this->credentialsProvider = $credentialsProvider;
    }

    public function stripeWebhook(string $webhook)
    {
        // get example file contents
        $filePath = __DIR__.'/../../stripe-platform/Tests/webhook-examples/'.$webhook.'.event.yaml';
        if (!file_exists($filePath)) {
            throw $this->createNotFoundException(sprintf('Stripe %s webhook test does not exist in %s', $webhook, $filePath));
        }
        $content = file_get_contents($filePath);

        // create subrequest
        $request = new Request([], [], [], [], [], [], $content);
        $request->attributes->set('_controller', 'Softspring\PlatformBundle\Controller\WebhookController::notify');

        // add stripe signature
        /** @var StripeCredentials $credentials */
        $credentials = $this->credentialsProvider->getCredentialsFromWebhook($request);
        $request->server->set('HTTP_STRIPE_SIGNATURE', $this->getStripeSignatureHeader($content, $credentials->getWebhookSigningSecret()));

        $httpKernel = $this->container->get('http_kernel');
        return $response = $httpKernel->handle($request, HttpKernelInterface::SUB_REQUEST);
    }

    private function getStripeSignatureHeader(string $payload, string $secret)
    {
        $timestamp = time() - 1;
        $signedPayload = "{$timestamp}.{$payload}";
        $signatureV1 = hash_hmac('sha256', $signedPayload, $secret);

        return implode(',', ['t='.$timestamp, 'v1='.$signatureV1]);
    }
}