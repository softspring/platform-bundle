<?php

namespace Softspring\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Softspring\PlatformBundle\Model\PlatformByObjectTrait as PlatformByObjectTraitModel;

trait PlatformByObjectTrait
{
    use PlatformByObjectTraitModel;

    /**
     * @var int|null
     * @ORM\Column(name="platform", type="smallint", nullable=true, options={"unsigned":true})
     */
    protected $platform;

    /**
     * @return string|null
     */
    public function getPlatform(): ?string
    {
        return [
            0 => 'app',
            1 => 'stripe',
        ][$this->platform];
    }

    /**
     * @param string|null $platform
     */
    public function setPlatform(?string $platform): void
    {
        $this->platform = $platform ? [
            'app' => 0,
            'stripe' => 1,
        ][$platform] ?? null : null;
    }
}