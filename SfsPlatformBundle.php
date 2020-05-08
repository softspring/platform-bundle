<?php

namespace Softspring\PlatformBundle;

use Softspring\PlatformBundle\DependencyInjection\Compiler\ApiAdaptersCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SfsPlatformBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new ApiAdaptersCompilerPass());
    }
}