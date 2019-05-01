<?php

namespace yii2bundle\telegram\domain\actions;

use TelegramBot\Api\Types\Message;

class MenuAction extends BaseAction {
	
	public $text;
    public $keyboard;
	
	public function run(Message $message) {
        \App::$domain->telegram->app->response->sendKeyboard($message, $this->text, $this->keyboard);
	}
	
}
