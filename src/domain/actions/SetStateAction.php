<?php

namespace yii2bundle\telegram\domain\actions;

use TelegramBot\Api\Types\Message;
use yii2bundle\telegram\domain\enums\StateEnum;

class SetStateAction extends BaseAction {

	public $state = StateEnum::DEFAULT;

	public function run(Message $message) {
        $this->app->setState($this->state);
        $this->app->response->sendMessage($message, '✅ отменено');
	}
	
}
