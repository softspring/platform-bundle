<?php

namespace Softspring\PlatformBundle\Provider;

use Softspring\PlatformBundle\Model\PlatformObjectInterface;

class StaticPlatformProvider implements PlatformProviderInterface
{
    /**
     * @var string
     */
    protected $platform;

    /**
     * StaticPlatformProvider constructor.
     *
     * @param string $platform
     */
    public function __construct(string $platform)
    {
        $this->platform = $platform;
    }

    public function getPlatform($object = null): ?string
    {
        if ($object !== null && !$object instanceof PlatformObjectInterface) {
            return null;
        }

        return $this->platform;
    }
}