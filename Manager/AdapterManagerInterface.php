<?php

namespace Softspring\PlatformBundle\Manager;

use Softspring\PlatformBundle\Adapter\PlatformAdapterInterface;

interface AdapterManagerInterface
{
    /**
     * @param string $platform
     * @param string $adapter
     *
     * @return PlatformAdapterInterface
     */
    public function get(string $platform, string $adapter): PlatformAdapterInterface;
}