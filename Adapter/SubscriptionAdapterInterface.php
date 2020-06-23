<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\PlatformBundle\Exception\PlatformException;
use Softspring\PlatformBundle\Model\PlatformObjectInterface;
use Softspring\SubscriptionBundle\Model\PlanInterface;
use Softspring\SubscriptionBundle\Model\SubscriptionInterface;
use Stripe\Subscription;

interface SubscriptionAdapterInterface extends PlatformAdapterInterface
{
    /**
     * @param SubscriptionInterface $subscription
     *
     * @return mixed
     * @throws PlatformException
     */
    public function create(SubscriptionInterface $subscription);

    /**
     * @param SubscriptionInterface|PlatformObjectInterface $subscription
     *
     * @return Subscription
     * @throws PlatformException
     */
    public function update(SubscriptionInterface $subscription);

    /**
     * Retrieve the subscription platform data
     *
     * @param SubscriptionInterface $subscription
     *
     * @return mixed
     * @throws PlatformException
     */
    public function get(SubscriptionInterface $subscription);

    /**
     * @param SubscriptionInterface $subscription
     *
     * @return mixed
     * @throws PlatformException
     */
    public function cancelRenovation(SubscriptionInterface $subscription);

    /**
     * @param SubscriptionInterface $subscription
     *
     * @return mixed
     * @throws PlatformException
     */
    public function uncancelRenovation(SubscriptionInterface $subscription);

    /**
     * @param SubscriptionInterface $subscription
     * @param PlanInterface         $fromPlan
     * @param PlanInterface         $toPlan
     *
     * @return mixed
     * @throws PlatformException
     */
    public function upgradePlan(SubscriptionInterface $subscription, PlanInterface $fromPlan, PlanInterface $toPlan);

    /**
     * @param SubscriptionInterface $subscription
     *
     * @return mixed
     * @throws PlatformException
     */
    public function cancel(SubscriptionInterface $subscription);

    /**
     * @param SubscriptionInterface $subscription
     *
     * @return mixed
     * @throws PlatformException
     */
    public function trial(SubscriptionInterface $subscription);

    /**
     * @param SubscriptionInterface $subscription
     *
     * @return mixed
     * @throws PlatformException
     */
    public function finishTrial(SubscriptionInterface $subscription);
}