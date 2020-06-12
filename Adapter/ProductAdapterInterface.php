<?php

namespace Softspring\PlatformBundle\Adapter;

use Doctrine\Common\Collections\Collection;
use Softspring\SubscriptionBundle\Model\ProductInterface;

interface ProductAdapterInterface extends PlatformAdapterInterface
{
    /**
     * @param ProductInterface $product
     *
     * @return mixed
     */
    public function create(ProductInterface $product);

    /**
     * @param ProductInterface $product
     *
     * @return mixed
     */
    public function update(ProductInterface $product);

    /**
     * @param ProductInterface $product
     *
     * @return mixed
     */
    public function delete(ProductInterface $product);

    /**
     * @return Collection
     */
    public function list(): Collection;
}