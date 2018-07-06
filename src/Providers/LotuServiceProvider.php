<?php

namespace Lotu\Providers;

use IO\Extensions\Functions\Partial;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;
use IO\Helper\TemplateContainer;

class LotuServiceProvider extends ServiceProvider
{

	const PRIORITY = 0;

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

			 $eventDispatcher->listen('IO.tpl.item', function (TemplateContainer $container)
        {
            $container->setTemplate('Lotu::Item.SingleItem');
            return false;
        }, self::PRIORITY);
	 }



}
