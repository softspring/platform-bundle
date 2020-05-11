<?php

namespace Softspring\PlatformBundle\Exception;

use Throwable;

class PlatformException extends \Exception
{
    /**
     * @var string
     */
    protected $platformId;

    /**
     * @var string
     */
    protected $platformError;

    /**
     * PlatformException constructor.
     *
     * @param string         $platformId
     * @param string         $platformError
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(string $platformId, string $platformError, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->platformId = $platformId;
        $this->platformError = $platformError;
    }

    /**
     * @return string
     */
    public function getPlatformId(): string
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
        return sprintf('platform_error.%s.%s', $this->getPlatformId(), $this->getPlatformError());
    }
}