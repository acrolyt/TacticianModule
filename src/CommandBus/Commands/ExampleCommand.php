<?php
/**
 * Created by PhpStorm.
 * User: maw
 * Date: 22.04.15
 * Time: 13:58
 */

namespace CommandBus\Commands\Bill;

use CommandBus\Commands\BaseCommand;

class ExampleCommand extends BaseCommand {

	/**
	 * @param User   $user
	 * @param        $payload
	 * @param string $comment
	 */
	public function __construct($user_id, $payload, $comment = null) {

		$this->user_id = $user_id;
		$logData['my_example_data'] = $payload;
		$this->comment = $comment;

		parent::__construct($user_id, $logData, $comment);

	}

}