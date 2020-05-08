<?php

namespace Softspring\PlatformBundle\Exception;

use Softspring\PlatformBundle\PlatformInterface;
use Throwable;

class PlatformException extends \Exception
{
    /**
     * @var int
     */
    protected $platformId;

    /**
     * @var string
     */
    protected $platformError;

    public function __construct(int $platformId, string $platformError, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->platformId = $platformId;
        $this->platformError = $platformError;
    }

    /**
     * @return int
     */
    public function getPlatformId(): int
    {
        return $this->platformId;
    }

    /**
     * @return string
     */
    public function getPlatformError(): string
    {
        return $this->platformError;
    }

    /**
     * @return string
     */
    public function getTranslationTag(): string
    {
        switch ($this->getPlatformId()) {
            case PlatformInterface::PLATFORM_STRIPE:
                return 'platform_error.stripe.'.$this->getPlatformError();

            case PlatformInterface::PLATFORM_APP:
                return 'platform_error.app.'.$this->getPlatformError();

            default:
                return 'platform_error.unknown.'.$this->getPlatformError();
        }
    }
}