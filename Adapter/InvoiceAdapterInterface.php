<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\PlatformBundle\Exception\PlatformException;
use Softspring\PaymentBundle\Model\InvoiceInterface;

interface InvoiceAdapterInterface extends PlatformAdapterInterface
{
    /**
     * Creates invoice on defined platform
     *
     * @param InvoiceInterface $invoice
     *
     * @return mixed
     * @throws PlatformException
     */
    public function create(InvoiceInterface $invoice);

    /**
     * Retrieve the invoice platform data
     *
     * @param InvoiceInterface $invoice
     *
     * @return mixed
     * @throws PlatformException
     */
    public function get(InvoiceInterface $invoice);
}