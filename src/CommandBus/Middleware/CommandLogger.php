<?php
/**
 * User: Marco Wegner
 * Date: 22.04.15
 * Time: 14:12
 */

namespace CommandBus\Middleware;

use CommandBus\Commands\BaseCommand;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;
use Zend\Log\Logger;
use Zend\Log\Writer\Stream;

class CommandLogger {

	/** @var EntityManager  */
	protected $sl;
	/** @var  Connection */
	protected $connection;

	public function __construct(EntityManager $entityManager) {
		$this->em = $entityManager;
		$this->connection = $entityManager->getConnection();
	}

	/**
	 * @param BaseCommand $command
	 *
	 * @return bool
	 */
	public function logDb(BaseCommand $command) {

		/* Database Logging Query */
		/* for example */
		$this->connection->insert(
			'command_bus_log',
			array(
				'user_id' => $command->user->getId(),
				'payload' => json_encode($command->logData),
				'command' => $command->getCommandName(),
				'comment' => $command->comment,
			)
		);

	}

	public function logText(BaseCommand $command) {
		$logger = new Logger;
		$writer = new Stream('./log/command_bus.log');

		$logger->addWriter($writer);

		$logger->info('Some logging text');

	}

}