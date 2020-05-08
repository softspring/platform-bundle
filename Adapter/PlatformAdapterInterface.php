<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\PlatformBundle\Model\PlatformObjectInterface;

interface PlatformAdapterInterface
{
    /**
     * @param object|PlatformObjectInterface $dbObject
     *
     * @return bool
     */
    public function supports($dbObject): bool;
}