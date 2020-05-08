<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\CustomerBundle\Model\AddressInterface;
use Softspring\PlatformBundle\Exception\PlatformException;

interface AddressAdapterInterface extends PlatformAdapterInterface
{
    /**
     * Creates address on defined platform
     *
     * @param AddressInterface $address
     *
     * @return mixed
     * @throws PlatformException
     */
    public function create(AddressInterface $address);

    /**
     * Retrieve the address platform data
     *
     * @param AddressInterface $address
     *
     * @return mixed
     * @throws PlatformException
     */
    public function get(AddressInterface $address);
}