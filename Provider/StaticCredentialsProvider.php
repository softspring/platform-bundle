<?php

namespace Softspring\PlatformBundle\Provider;

use Softspring\PlatformBundle\Exception\PlatformException;
use Softspring\PlatformBundle\Stripe\Client\StripeCredentials;
use Symfony\Component\HttpFoundation\Request;

class StaticCredentialsProvider implements CredentialsProviderInterface
{
    /**
     * @var PlatformProviderInterface
     */
    protected $platformProvider;

    /**
     * @var array
     */
    protected $platformsConfig;

    /**
     * StaticCredentialsProvider constructor.
     *
     * @param PlatformProviderInterface $platformProvider
     * @param array                     $platformsConfig
     */
    public function __construct(PlatformProviderInterface $platformProvider, array $platformsConfig)
    {
        $this->platformProvider = $platformProvider;
        $this->platformsConfig = $platformsConfig;
    }

    public function getCredentials($dbObject): CredentialsInterface
    {
        $platform = $this->platformProvider->getPlatform($dbObject);

        switch ($platform) {
            case 'stripe':
                $config = $this->platformsConfig['stripe'];
                return new StripeCredentials($config['secret_key'], $config['public_key'], $config['webhook_key']);
        }

        throw new PlatformException("$platform", 'Platform is not supported');
    }

    public function getCredentialsFromWebhook(Request $request): CredentialsInterface
    {
        $platform = $this->platformProvider->getPlatform(null);

        switch ($platform) {
            case 'stripe':
                $config = $this->platformsConfig['stripe'];
                return new StripeCredentials($config['secret_key'], $config['public_key'], $config['webhook_key']);
        }

        throw new PlatformException($platform, 'Platform is not supported');
    }
}