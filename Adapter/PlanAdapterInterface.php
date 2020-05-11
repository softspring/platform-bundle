<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\SubscriptionBundle\Model\PlanInterface;

interface PlanAdapterInterface extends PlatformAdapterInterface
{
    /**
     * @param PlanInterface $plan
     *
     * @return mixed
     */
    public function create(PlanInterface $plan);

    /**
     * @param PlanInterface $plan
     *
     * @return mixed
     */
    public function update(PlanInterface $plan);

    /**
     * @param PlanInterface $plan
     *
     * @return mixed
     */
    public function delete(PlanInterface $plan);

    /**
     * @return mixed[]
     */
    public function list(): array;
}