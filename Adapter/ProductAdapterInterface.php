<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\SubscriptionBundle\Model\ProductInterface;

interface ProductAdapterInterface extends PlatformAdapterInterface
{
    /**
     * @param ProductInterface $product
     */
    public function create(ProductInterface $product): void;

    /**
     * @param ProductInterface $product
     */
    public function update(ProductInterface $product): void;

    /**
     * @param ProductInterface $product
     */
    public function delete(ProductInterface $product): void;

    /**
     * @return mixed[]
     */
    public function list(): array;
}