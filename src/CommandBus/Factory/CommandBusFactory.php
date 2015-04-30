<?php
/**
 * User: Marco Wegner
 * Date: 22.04.15
 * Time: 11:55
 */

namespace CommandBus\Factory;

use CommandBus\Handler\NullHandler;
use CommandBus\Middleware\CommandLogger;
use CommandBus\Middleware\LoggingMiddleware;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleClassNameInflector;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CommandBusFactory implements FactoryInterface {

	/**
	 * Create service
	 *
	 * @param ServiceLocatorInterface $serviceLocator
	 *
	 * @return mixed
	 */
	public function createService(ServiceLocatorInterface $serviceLocator) {

		$entityManager = $serviceLocator->get('entityManager');

		$locator = new InMemoryLocator();

		/* Map Commands to Handlers*/
		/* new line for every new Command*/
		$nullHandler = new NullHandler();

		/* Bill*/
		$locator->addHandler($nullHandler, ExampleCommand::class);

		$extractor = new ClassNameExtractor();
		$inflector = new HandleClassNameInflector();
		$commandHandlerMiddleware = new CommandHandlerMiddleware($extractor, $locator, $inflector);
		$logger = new LoggingMiddleware(new CommandLogger($entityManager));

		$bus = new CommandBus([$logger, $commandHandlerMiddleware]);

		return $bus;
	}
}