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
		$providers = array(); // TODO: need to find a nice way of getting these from the processor
		return false;
	}
	
	public function handleAttach()
	{
		
	}
}