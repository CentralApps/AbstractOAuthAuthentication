<?php
namespace CentralApps\Authentication;

interface OAuthUserGatewayInterface
{
    public function attachTokensFromProvider(Providers\OAuthProviderInterface $provider);
}
