<?php

namespace Softspring\PlatformBundle\Manager;

use Softspring\PlatformBundle\Adapter\PlatformAdapterInterface;
use Softspring\PlatformBundle\Exception\PlatformException;

class AdapterManager implements AdapterManagerInterface
{
    /**
     * @var PlatformAdapterInterface[]
     */
    protected $adapters;

    /**
     * ApiManager constructor.
     *
     * @param PlatformAdapterInterface[] $adapters
     */
    public function __construct(array $adapters)
    {
        $this->adapters = $adapters;
    }

    /**
     * @inheritDoc
     */
    public function get(string $platform, string $adapter): PlatformAdapterInterface
    {
        if (!isset($this->adapters[$platform][$adapter])) {
            throw new PlatformException($platform, sprintf('Adapter %s does not exist for %s platform', $adapter, $platform));
        }

        return $this->adapters[$platform][$adapter];
    }

    /**
     * @param string $adapter
     *
     * @return PlatformAdapterInterface[]
     */
    public function getByType(string $adapter): array
    {
        $adapters = [];

        foreach ($this->adapters as $platform => $platformAdapters) {
            foreach ($platformAdapters as $platformAdapterName => $platformAdapter) {
                if ($platformAdapterName == $adapter) {
                    $adapters[$platformAdapterName] = $platformAdapter;
                }
            }
        }

        return $adapters;
    }
}