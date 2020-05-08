<?php

namespace Softspring\PlatformBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('sfs_platform');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->arrayNode('stripe')
                    ->canBeEnabled()
                    ->children()
                        ->scalarNode('secret_key')->isRequired()->end()
                        ->scalarNode('public_key')->isRequired()->end()
                        ->scalarNode('webhook_key')->isRequired()->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}