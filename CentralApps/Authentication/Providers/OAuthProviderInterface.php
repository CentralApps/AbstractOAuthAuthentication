<?php
namespace CentralApps\Authentication\Providers;

interface OAuthProviderInterface extends ProviderInterface
{
	public function getProviderName();
	public function getTokens();
	public function getExternalId();
	public function getLoginUrl();
	public function getRegisterUrl();
	public function getAttachUrl();
}
