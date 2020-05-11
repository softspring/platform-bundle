<?php

namespace Softspring\PlatformBundle\Model;

trait PlatformByObjectTrait
{
    /**
     * @var string|null
     */
    protected $platform;

    /**
     * @return string|null
     */
    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    /**
     * @param string|null $platform
     */
    public function setPlatform(?string $platform): void
    {
        $this->platform = $platform;
    }
}