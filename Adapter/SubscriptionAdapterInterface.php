<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\PlatformBundle\Exception\PlatformException;
use Softspring\SubscriptionBundle\Model\SubscriptionInterface;
use Softspring\PlatformBundle\Exception\SubscriptionException;
use Softspring\PlatformBundle\Response\SubscriptionResponse;

interface SubscriptionAdapterInterface extends PlatformAdapterInterface
{
    /**
     * @param SubscriptionInterface $subscription
     *
     * @return mixed
     * @throws SubscriptionException
     * @throws PlatformException
     */
    public function create(SubscriptionInterface $subscription);

    /**
     * Retrieve the subscription platform data
     *
     * @param SubscriptionInterface $subscription
     *
     * @return mixed
     * @throws SubscriptionException
     * @throws PlatformException
     */
    public function get(SubscriptionInterface $subscription);

    /**
     * Updates the subscription in platform
     *
     * @param SubscriptionInterface $subscription
     *
     * @return mixed
     * @throws SubscriptionException
     * @throws PlatformException
     */
    public function update(SubscriptionInterface $subscription);







    /**
     * @deprecated Use create method
     *
     * @param mixed $customer
     * @param mixed $plan
     * @param array $options
     *
     * @return SubscriptionResponse
     *
     * @throws SubscriptionException
     */
    public function subscribe($customer, $plan, array $options = []): SubscriptionResponse;

    /**
     * @param mixed $customer
     * @param mixed $plan
     * @param int   $days
     * @param array $options
     *
     * @return SubscriptionResponse
     *
     * @throws SubscriptionException
     */
    public function trial($customer, $plan, int $days, array $options = []): SubscriptionResponse;

    /**
     * @param mixed $subscription
     *
     * @return SubscriptionResponse
     *
     * @throws SubscriptionException
     */
    public function details($subscription): SubscriptionResponse;

    /**
     * @param mixed $subscription
     *
     * @return SubscriptionResponse
     *
     * @throws SubscriptionException
     */
    public function cancelRenovation($subscription): SubscriptionResponse;

    /**
     * @param mixed $subscription
     *
     * @return SubscriptionResponse
     *
     * @throws SubscriptionException
     */
    public function uncancelRenovation($subscription): SubscriptionResponse;

    /**
     * @param mixed $subscription
     *
     * @return SubscriptionResponse
     *
     * @throws SubscriptionException
     */
    public function cancel($subscription): SubscriptionResponse;

    /**
     * @param       $subscription
     * @param       $plan
     * @param array $options
     *
     * @return SubscriptionResponse
     *
     * @throws SubscriptionException
     */
    public function upgrade($subscription, $plan, array $options = []): SubscriptionResponse;

    /**
     * @param mixed $subscription
     * @param mixed $plan
     *
     * @return SubscriptionResponse
     *
     * @throws SubscriptionException
     */
    public function finishTrial($subscription, $plan): SubscriptionResponse;
}