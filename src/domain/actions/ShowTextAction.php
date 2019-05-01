<?php

namespace yii2bundle\telegram\domain\actions;

use TelegramBot\Api\Types\Message;

class ShowTextAction extends BaseAction {
	
	public $text;
	
	public function run(Message $message) {
        \App::$domain->telegram->response->sendMessage($message, $this->text);
	}
	
}
