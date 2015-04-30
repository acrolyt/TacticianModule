<?php
/**
 * User: Marco Wegner
 * Date: 22.04.15
 * Time: 14:09
 */

namespace CommandBus\Middleware;

use CommandBus\Commands\BaseCommand;
use League\Tactician\Middleware;

class LoggingMiddleware implements Middleware {
	/** @var CommandLogger  */
	protected $logger;

	/**
	 * @param CommandLogger $logger
	 */
	public function __construct(CommandLogger $logger) {
		$this->logger = $logger;
	}

	/**
	 * @param BaseCommand $command
	 * @param callable $next
	 *
	 * @return mixed
	 */
	public function execute($command, callable $next) {

		$this->logger->logDb($command);
		$returnValue = $next($command);

		return $returnValue;

	}

}