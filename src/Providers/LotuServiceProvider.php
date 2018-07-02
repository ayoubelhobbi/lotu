<?php

namespace Lotu\Providers;

use IO\Extensions\Functions\Partial;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;

class LotuServiceProvider extends ServiceProvider
{

	/**
	 * Register the service provider.
	 */
	public function register()
	{

	}

	/**
	* Boot ThemeFooter
	*/
 public function boot(Twig $twig, Dispatcher $eventDispatcher)
	 {
			 $eventDispatcher->listen('IO.init.templates', function(Partial $partial)
			 {
					$partial->set('footer', 'Lotu::ThemeFooter');
			 }, 0);
			 return false;
	 }
}
