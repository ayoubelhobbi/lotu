<?php

namespace Lotu\Providers;

use IO\Extensions\Functions\Partial;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;
use IO\Helper\TemplateContainer;
use IO\Helper\ComponentContainer;
use IO\Services\ItemSearch\Helper\ResultFieldTemplate;



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

			 $eventDispatcher->listen('IO.Component.Import', function (ComponentContainer $container)
			 {
					 if ($container->getOriginComponentTemplate()=='Ceres::Item.Components.SingleItem')
					 {
							 $container->setNewComponentTemplate('Lotu::Item.SingleItem');
					 }
			 }, self::PRIORITY);

			 $eventDispatcher->listen( 'IO.ResultFields.*', function(ResultFieldTemplate $templateContainer) {
       $templateContainer->setTemplates([
           ResultFieldTemplate::TEMPLATE_SINGLE_ITEM   => 'Lotu::ResultFields.SingleItemWrapper'
       ]);
   		}, 0);

	 }



}
