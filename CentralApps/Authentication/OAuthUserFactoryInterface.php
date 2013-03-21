<?php
namespace CentralApps\Authentication;

interface OAuthUserFactoryInterface
{
	public function getFromProvider(Providers\OAuthProviderInterface $provider);
}
