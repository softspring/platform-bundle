<?php

namespace Softspring\PlatformBundle\DependencyInjection\Compiler;

use Softspring\PlatformBundle\Manager\AdapterManagerInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ApiAdaptersCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        // always first check if the primary service is defined
        if (!$container->has(AdapterManagerInterface::class)) {
            return;
        }

        $definition = $container->findDefinition(AdapterManagerInterface::class);

        // find all service IDs with the app.mail_transport tag
        $taggedServices = $container->findTaggedServiceIds('sfs_platform.adapter');

        $adapters = [];

        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                $adapters[$attributes['platform']][$attributes['model']] = new Reference($id);
            }
        }

        $definition->setArgument('$adapters', $adapters);
    }
}