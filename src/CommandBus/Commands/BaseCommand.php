<?php
/**
 * User: Marco Wegner
 * Date: 22.04.15
 * Time: 13:34
 * Description: Exemplary BaseCommand for logging
 * business data changes by a logged-in user
 */

namespace CommandBus\Commands;

use Hzm\Entity\Base\User;

class BaseCommand {
	/** @var string  */
	public $user_id;
	/** @var  mixed */
	public $logData;
	/** @var  string */
	public $comment;
	/** @var  boolean */
	protected $skipLog = false;

	protected $commandName;

	/**
	 * @param string $user_id
	 * @param array  $logData
	 * @param string $comment
	 */
	public function __construct($user_id, $logData, $comment = null) {
		$this->user_id = $user_id;
		$this->logData = $logData;
		$this->comment = $comment;
		$class_array = explode('\\', get_class($this));
		$this->commandName = end($class_array);

	}

	public function getCommandName() {
		return $this->commandName;
	}

	public function setSkipLog() {
		$this->skipLog = true;
		// dump('skip');
	}

	public function getSkipLog() {
		return $this->skipLog;
	}

}