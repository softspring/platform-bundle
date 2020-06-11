<?php

namespace Softspring\PlatformBundle\DependencyInjection;

use Softspring\CustomerBundle\Model\CustomerInterface;
use Softspring\PaymentBundle\Model\PaymentInterface;
use Softspring\PlatformBundle\Stripe as StripePlatform;
use Softspring\SubscriptionBundle\Model\SubscriptionInterface;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class SfsPlatformExtension extends Extension
{
    /**
     * @inheritdoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);

        // load services
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/services'));
        $loader->load('manager.yaml');

        $container->setParameter('sfs_platform.single_platform', $config['platform']);
        $container->setParameter('sfs_platform.platforms_configs', $this->getPlatformsConfig($config));
        $loader->load('providers/static_platform.yaml');
        $loader->load('controllers/webhook.yaml');
        $loader->load('webhook_factory.yaml');
        $loader->load('twig_extension.yaml');

        $this->loadCustomerResources($loader, $container, $config);
        $this->loadPaymentResources($loader, $container, $config);
        $this->loadSubscriptionResources($loader, $container, $config);
        $this->loadStripePlatform($loader, $container, $config);
    }

    protected function loadCustomerResources(YamlFileLoader $loader, ContainerBuilder $container, array $config): void
    {
        if (!interface_exists(CustomerInterface::class)) {
            return;
        }

        if (class_exists(StripePlatform\Adapter\CustomerAdapter::class)) {
            $loader->load('stripe_platform/sfs_customer.yaml');
            $loader->load('stripe_platform/sfs_customer_source.yaml');
        }
    }

    protected function loadPaymentResources(YamlFileLoader $loader, ContainerBuilder $container, array $config): void
    {
        if (!interface_exists(PaymentInterface::class)) {
            return;
        }

        if (class_exists(StripePlatform\Adapter\PaymentAdapter::class)) {
            $loader->load('stripe_platform/sfs_payment_discount.yaml');
            $loader->load('stripe_platform/sfs_payment_payment.yaml');
            $loader->load('stripe_platform/sfs_payment_concept.yaml');
            $loader->load('stripe_platform/sfs_payment_invoice.yaml');
        }
    }

    protected function loadSubscriptionResources(YamlFileLoader $loader, ContainerBuilder $container, array $config): void
    {
        if (!interface_exists(SubscriptionInterface::class)) {
            return;
        }

        if (class_exists(StripePlatform\Adapter\SubscriptionAdapter::class)) {
            $loader->load('stripe_platform/sfs_subscription.yaml');
        }

        if (class_exists(StripePlatform\Adapter\PlanAdapter::class)) {
            $loader->load('stripe_platform/sfs_subscription_plan.yaml');
        }
    }

    protected function loadStripePlatform(YamlFileLoader $loader, ContainerBuilder $container, array $config): void
    {
        if (!isset($config['stripe']['enabled']) && true !== $config['stripe']['enabled']) {
            return;
        }

        if (!class_exists(StripePlatform\Event\WebhookEventFactory::class)) {
            throw new \Exception('Stripe platform bridge package is required, install with composer require softpring/stripe-platform');
        }

        $loader->load('stripe_platform/stripe.yaml');
        $loader->load('stripe_platform/webhook_factory.yaml');
        $loader->load('stripe_platform/webhook_listeners.yaml');
    }

    protected function getPlatformsConfig(array $config): array
    {
        $platformConfig = [];

        if (isset($config['stripe']['enabled']) && true === $config['stripe']['enabled']) {
            $platformConfig['stripe'] = [
                'secret_key' => $config['stripe']['secret_key'],
                'public_key' => $config['stripe']['public_key'],
                'webhook_key' => $config['stripe']['webhook_key'],
            ];
        }

        return $platformConfig;
    }
}