<?php

namespace Softspring\PlatformBundle\Provider;

use Symfony\Component\HttpFoundation\Request;

interface CredentialsProviderInterface
{
    public function getCredentials($dbObject): CredentialsInterface;

    public function getPlatformCredentials(string $platform): CredentialsInterface;

    public function getCredentialsFromWebhook(Request $request): CredentialsInterface;
}