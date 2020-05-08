<?php

namespace Softspring\PlatformBundle\Model;

interface PlatformObjectInterface
{
    /**
     * @return int|null
     * @deprecated Will be optional, depends on project. Some projects has only one platform, and others could have more
     */
    public function getPlatform(): ?int;

    /**
     * @return string|null
     */
    public function getPlatformId(): ?string;

    /**
     * @param int|null $platform
     * @deprecated Will be optional, depends on project. Some projects has only one platform, and others could have more
     */
    public function setPlatform(?int $platform): void;

    /**
     * @param string|null $platformId
     */
    public function setPlatformId(?string $platformId): void;

    /**
     * @return array|null
     */
    public function getPlatformData(): ?array;

    /**
     * @param array|null $platformData
     */
    public function setPlatformData(?array $platformData): void;

    /**
     * @return \DateTime|null
     */
    public function getPlatformLastSync(): ?\DateTime;

    /**
     * @param \DateTime|null $platformLastSync
     */
    public function setPlatformLastSync(?\DateTime $platformLastSync): void;

    /**
     * @return bool
     */
    public function isTestMode(): bool;

    /**
     * @param bool $testMode
     */
    public function setTestMode(bool $testMode): void;

    /**
     * @return bool
     */
    public function isPlatformConflict(): bool;

    /**
     * @param bool $platformConflict
     */
    public function setPlatformConflict(bool $platformConflict): void;
}