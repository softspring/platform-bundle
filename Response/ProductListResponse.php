<?php

namespace Softspring\PlatformBundle\Response;

class ProductListResponse extends AbstractListResponse
{
    public function __construct(int $platform, $platformResponse)
    {
        parent::__construct($platform, $platformResponse);

        foreach ($this->elements as $i => $element) {
            $this->elements[$i] = new ProductResponse($platform, $element);
        }
    }
}