<?php

namespace Softspring\PlatformBundle\Adapter;

use Doctrine\Common\Collections\Collection;
use Softspring\PlatformBundle\Transformer\PlatformTransformerInterface;
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
     * @return Collection
     */
    public function list(): Collection;

    /**
     * @return PlatformTransformerInterface|null
     */
    public function getTransformer(): ?PlatformTransformerInterface;
}