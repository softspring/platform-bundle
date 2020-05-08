<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\PlatformBundle\Exception\PlatformException;
use Softspring\PaymentBundle\Model\PaymentInterface;

interface PaymentAdapterInterface extends PlatformAdapterInterface
{
    /**
     * Creates payment on defined platform
     *
     * @param PaymentInterface $payment
     *
     * @return mixed
     * @throws PlatformException
     */
    public function create(PaymentInterface $payment);

    /**
     * Retrieve the payment platform data
     *
     * @param PaymentInterface $payment
     *
     * @return mixed
     * @throws PlatformException
     */
    public function get(PaymentInterface $payment);
}