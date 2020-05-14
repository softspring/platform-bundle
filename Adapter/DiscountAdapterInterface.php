<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\PlatformBundle\Exception\PlatformException;
use Softspring\PaymentBundle\Model\DiscountInterface;

interface DiscountAdapterInterface extends PlatformAdapterInterface
{
    /**
     * Creates discount on defined platform
     *
     * @param DiscountInterface $discount
     *
     * @return mixed
     * @throws PlatformException
     */
    public function create(DiscountInterface $discount);

    /**
     * Retrieve the discount platform data
     *
     * @param DiscountInterface $discount
     *
     * @return mixed
     * @throws PlatformException
     */
    public function get(DiscountInterface $discount);
}