<?php
/**
 * User: Marco Wegner
 * Date: 22.04.15
 * Time: 15:16
 */

namespace CommandBus\Handler;
use CommandBus\Commands\BaseCommand;

/**
 * Class NullHandler
 *
 * @package CommandBus\Handler
 */
class NullHandler {

	/**
	 * @param ExampleCommand $command
	 */
	public function handleExampleCommand(ExampleCommand $command) {
		$this->debug($command);
	}

	/**
	 * @param $command
	 */
	private function debug(BaseCommand $command) {
		var_dump($command->getCommandName);
		echo "works!";
	}

}