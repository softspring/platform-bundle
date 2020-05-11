<?php

namespace Softspring\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Softspring\PlatformBundle\Model\PlatformObjectTrait as PlatformObjectTraitModel;

trait PlatformObjectTrait
{
    use PlatformObjectTraitModel;

    /**
     * @var int|null
     * @ORM\Column(name="platform", type="smallint", nullable=true, options={"unsigned":true})
     * @deprecated Will be optional, depends on project. Some projects has only one platform, and others could have more
     */
    protected $platform;

    /**
     * @var string|null
     * @ORM\Column(name="platform_id", type="string", nullable=true)
     */
    protected $platformId;

    /**
     * @var array|null
     * @ORM\Column(name="platform_data", type="json", nullable=true)
     */
    protected $platformData;

    /**
     * @var \DateTime|null
     * @ORM\Column(name="platform_last_sync", type="integer", nullable=true, options={"unsigned":true})
     */
    protected $platformLastSync;

    /**
     * @var bool
     * @ORM\Column(name="platform_conflict", type="boolean", nullable=false, options={"default":0})
     */
    protected $platformConflict = false;

    /**
     * @var bool
     * @ORM\Column(name="platform_test_mode", type="boolean", nullable=false, options={"default":0})
     */
    protected $platformTestMode = false;
}