<?php

namespace yii2bundle\telegram\actions;

use TelegramBot\Api\Types\Message;

class SetStateAction extends BaseAction {

	public $state = 'default';

	public function run(Message $message) {
        $this->app->setState($this->state);
        $this->app->response->sendMessage($message, '✅ отменено');
	}
	
}
