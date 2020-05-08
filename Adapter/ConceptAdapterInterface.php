<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\PlatformBundle\Exception\PlatformException;
use Softspring\PaymentBundle\Model\ConceptInterface;

interface ConceptAdapterInterface extends PlatformAdapterInterface
{
    /**
     * Creates concept on defined platform
     *
     * @param ConceptInterface $concept
     *
     * @return mixed
     * @throws PlatformException
     */
    public function create(ConceptInterface $concept);

    /**
     * Retrieve the concept platform data
     *
     * @param ConceptInterface $concept
     *
     * @return mixed
     * @throws PlatformException
     */
    public function get(ConceptInterface $concept);
}