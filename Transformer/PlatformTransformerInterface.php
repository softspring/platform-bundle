<?php

namespace Softspring\PlatformBundle\Transformer;

interface PlatformTransformerInterface
{
    /**
     * @param object $dbObject
     *
     * @return bool
     */
    public function supports($dbObject): bool;

    /**
     * @param object $dbEntity
     * @param string $action
     *
     * @return array
     */
    public function transform($dbEntity, string $action = ''): array;

    /**
     * @param object      $stripeObject
     * @param object|null $dbEntity
     * @param string      $action
     *
     * @return object
     */
    public function reverseTransform($stripeObject, $dbEntity = null, string $action = '');
}