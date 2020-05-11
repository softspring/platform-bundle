<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\PlatformBundle\Manager\AdapterManager;
use Softspring\PlatformBundle\Provider\PlatformProviderInterface;
use Softspring\SubscriptionBundle\Model\SubscriptionInterface;

class SubscriptionChainAdapter implements SubscriptionAdapterInterface
{
    /**
     * @var PlatformProviderInterface
     */
    protected $platformProvider;

    /**
     * @var AdapterManager
     */
    protected $adapterManager;

    /**
     * SubscriptionChainAdapter constructor.
     *
     * @param PlatformProviderInterface $platformProvider
     * @param AdapterManager            $adapterManager
     */
    public function __construct(PlatformProviderInterface $platformProvider, AdapterManager $adapterManager)
    {
        $this->platformProvider = $platformProvider;
        $this->adapterManager = $adapterManager;
    }

//    public function supports($dbObject): bool
//    {
//        if (!$dbObject instanceof SubscriptionInterface) {
//            return false;
//        }
//
//        return $this->getObjectAdapter($dbObject) instanceof SubscriptionAdapterInterface;
//    }

    public function create(SubscriptionInterface $subscription)
    {
        return $this->getObjectAdapter($subscription)->create($subscription);
    }

    public function get(SubscriptionInterface $subscription)
    {
        return $this->getObjectAdapter($subscription)->get($subscription);
    }

    public function update(SubscriptionInterface $subscription)
    {
        return $this->getObjectAdapter($subscription)->update($subscription);
    }

    public function subscribe($customer, $plan, array $options = [])
    {
        // return $this->getObjectAdapter($subscription)->subscribe($subscription);
    }

    public function trial($customer, $plan, int $days, array $options = [])
    {
        // return $this->getObjectAdapter($subscription)->trial($subscription);
    }

    public function details($subscription)
    {
        return $this->getObjectAdapter($subscription)->details($subscription);
    }

    public function cancelRenovation($subscription)
    {
        return $this->getObjectAdapter($subscription)->cancelRenovation($subscription);
    }

    public function uncancelRenovation($subscription)
    {
        return $this->getObjectAdapter($subscription)->uncancelRenovation($subscription);
    }

    public function cancel($subscription)
    {
        return $this->getObjectAdapter($subscription)->cancel($subscription);
    }

    public function upgrade($subscription, $plan, array $options = [])
    {
        return $this->getObjectAdapter($subscription)->upgrade($subscription, $plan, $options);
    }

    public function finishTrial($subscription, $plan)
    {
        return $this->getObjectAdapter($subscription)->finishTrial($subscription, $plan);
    }

    protected function getObjectAdapter($dbObject): ?SubscriptionAdapterInterface
    {
        $objectPlatform = $this->platformProvider->getPlatform($dbObject);

        /**
         * @var string $platform
         * @var SubscriptionAdapterInterface $adapter
         */
        foreach ($this->adapterManager->getByType('subscription') as $platform => $adapter) {
            if ($objectPlatform == $platform) {
                return $adapter;
            }
        }
    }
}