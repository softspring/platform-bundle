<?php

namespace Softspring\PlatformBundle\Response;

use Softspring\PlatformBundle\Exception\PlatformNotYetImplemented;
use Softspring\PlatformBundle\Exception\SubscriptionException;
use Softspring\PlatformBundle\PlatformInterface;

class ProductResponse extends AbstractResponse
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * SubscriptionResponse constructor.
     *
     * @param int   $platform
     * @param mixed $platformResponse
     *
     * @throws PlatformNotYetImplemented
     * @throws SubscriptionException
     */
    public function __construct(int $platform, $platformResponse)
    {
        parent::__construct($platform, $platformResponse);

        switch ($platform) {
            case PlatformInterface::PLATFORM_STRIPE:
                $this->id = $platformResponse->id;
                $this->testing = ! $platformResponse->livemode;

                if (isset($platformResponse->name)) {
                    $this->name = $platformResponse->name;
                }

                // active
                // created
                // description
                // images
                // metadata
                // statement_description
                // type: service
                // unit_label
                // updated
                break;

            default:
                throw new PlatformNotYetImplemented(-1, 'platform_not_yet_implemented');
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
}