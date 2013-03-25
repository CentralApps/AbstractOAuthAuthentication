<?php
namespace CentralApps\Authentication;

class OAuthProcessorDecorator
{
	protected $processor;
	protected $relatedProvider;
	
	public function __construct(Processor $processor)
	{
		$this->processor = $processor;	
	}
	
	public function __call($method, $args)
	{
		return call_user_func_array(array($this->processor, $method), $args);
	}
	
	public function isAttemptingToAttach()
	{
		$providers = clone $this->processor->getProviders();
		while($providers->valid()) {
			$provider = $providers->current();
			if($provider instanceof Providers\OAuthProviderInterface) {
				if($provider->isAttemptingToAttach()) {
					$this->relatedProvider = $provider;
					return true;
				}
			}
			$providers->next();
		}
		return false;
	}
    
    public function isAttemptingToRegister()
    {
        $providers = clone $this->processor->getProviders();
        while($providers->valid()) {
            $provider = $providers->current();
            if($provider instanceof Providers\OAuthProviderInterface) {
                if($provider->isAttemptingToRegister()) {
                    $this->relatedProvider = $provider;
                    return true;
                }
            }
            $providers->next();
        }
        return false;
    }
	
	public function handleAttach()
	{
		$this->relatedProvider->handleAttach();
	}
    
    public function handleRegister()
    {
        $this->relatedProvider->handleRegister();
    }
    
    public function getRelatedProvider()
    {
        return $this->relatedProvider;
    }
}
