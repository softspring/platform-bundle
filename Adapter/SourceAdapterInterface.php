<?php

namespace Softspring\PlatformBundle\Adapter;

use Softspring\CustomerBundle\Model\SourceInterface;
use Softspring\PlatformBundle\Exception\PlatformException;

interface SourceAdapterInterface extends PlatformAdapterInterface
{
    /**
     * Creates source on defined platform
     *
     * @param SourceInterface $source
     *
     * @return mixed
     * @throws PlatformException
     */
    public function create(SourceInterface $source);

    /**
     * Retrieve the source platform data
     *
     * @param SourceInterface $source
     *
     * @return mixed
     * @throws PlatformException
     */
    public function get(SourceInterface $source);
}