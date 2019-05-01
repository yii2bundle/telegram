<?php

namespace yii2bundle\telegram\domain\actions;

use TelegramBot\Api\Types\Message;
use yii2bundle\telegram\domain\enums\StateEnum;

class SetStateAction extends BaseAction {

	public $state = StateEnum::DEFAULT;

	public function run(Message $message) {
        \App::$domain->telegram->state->set($this->state);
        \App::$domain->telegram->response->sendMessage($message, '✅ отменено');
	}
	
}
