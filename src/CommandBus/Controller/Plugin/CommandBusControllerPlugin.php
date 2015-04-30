<?php
/**
 * User: Marco Wegner
 * Date: 22.04.15
 * Time: 11:37
 */

namespace CommandBus\Controller\Plugin;

use League\Tactician\CommandBus;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class CommandBusControllerPlugin extends AbstractPlugin {

	/**
	 * @var CommandBus
	 */
	private $commandBus;
	public function __construct(CommandBus $commandBus) {
		$this->commandBus = $commandBus;
	}
	public function __invoke() {
		return $this->commandBus;
	}

}