<?php

namespace Softspring\PlatformBundle\Provider;

interface PlatformProviderInterface
{
    public function getPlatform($object): ?string;
}