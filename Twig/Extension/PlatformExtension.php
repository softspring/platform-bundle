<?php

namespace Softspring\PlatformBundle\Twig\Extension;

use Softspring\PlatformBundle\Provider\PlatformProviderInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PlatformExtension extends AbstractExtension
{
    /**
     * @var PlatformProviderInterface
     */
    protected $platformProvider;

    /**
     * PlatformExtension constructor.
     *
     * @param PlatformProviderInterface $platformProvider
     */
    public function __construct(PlatformProviderInterface $platformProvider)
    {
        $this->platformProvider = $platformProvider;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('sfs_platform_get', [$this, 'getObjectPlatform'])
        ];
    }

    public function getObjectPlatform($object): ?string
    {
        return $this->platformProvider->getPlatform($object);
    }
}