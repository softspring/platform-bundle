<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\SubscriptionBundle\Model\ProductInterface;
use Softspring\PlatformBundle\Response\ProductListResponse;

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
     * @return ProductListResponse
     */
    public function list(): ProductListResponse;
}