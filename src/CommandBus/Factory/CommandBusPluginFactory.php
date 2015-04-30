<?php
/**
 * User: Marco Wegner
 * Date: 22.04.15
 * Time: 12:45
 */

namespace CommandBus\Factory;

use CommandBus\Controller\Plugin\CommandBusControllerPlugin;
use League\Tactician\CommandBus;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CommandBusPluginFactory implements FactoryInterface {

	/**
	 * Create service
	 *
	 * @param ServiceLocatorInterface $serviceLocator
	 *
	 * @return mixed
	 */
	public function createService(ServiceLocatorInterface $serviceLocator) {
		$sm = $serviceLocator->getServiceLocator();
		$bus = $sm->get(CommandBus::class);
		return new CommandBusControllerPlugin($bus);
	}

}