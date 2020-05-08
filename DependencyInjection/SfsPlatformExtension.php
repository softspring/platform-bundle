<?php

namespace Softspring\PlatformBundle\DependencyInjection;

use Softspring\CustomerBundle\Model\CustomerInterface;
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
        $this->loadCustomerResources($loader, $container, $config);
        $this->loadStripeResources($loader, $container, $config);
    }

    protected function loadCustomerResources(YamlFileLoader $loader, ContainerBuilder $container, array $config): void
    {
        if (!class_exists(CustomerInterface::class)) {
            return;
        }

        if (class_exists(\Softspring\PlatformBundle\Stripe\Adapter\CustomerAdapter::class)) {

        }


    }

    protected function loadStripeResources(YamlFileLoader $loader, ContainerBuilder $container, array $config): void
    {
        if (isset($config['stripe']['enabled']) && true === $config['stripe']['enabled']) {
            $container->setParameter('sfs_platform.stripe.secret_key', $config['stripe']['secret_key']);
            $container->setParameter('sfs_platform.stripe.public_key', $config['stripe']['public_key']);
            $container->setParameter('sfs_platform.stripe.webhook_key', $config['stripe']['webhook_key']);
        }

        if (!class_exists(\Softspring\PlatformBundle\Stripe\Event\WebhookEventFactory::class)) {
            return;
        }

        $loader->load('stripe_platform/webhook_factory.yaml');
    }
}