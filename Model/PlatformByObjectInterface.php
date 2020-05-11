<?php

namespace Softspring\PlatformBundle\Model;

interface PlatformByObjectInterface
{
    /**
     * @return string|null
     */
    public function getPlatform(): ?string;

    /**
     * @param string|null $platform
     */
    public function setPlatform(?string $platform): void;
}