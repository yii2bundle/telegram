<?php

namespace yii2bundle\telegram\actions;

use TelegramBot\Api\Types\Message;

class MenuAction extends BaseAction {
	
	public $text;
    public $keyboard;
	
	public function run(Message $message) {
        $this->app->response->sendKeyboard($message, $this->text, $this->keyboard);
	}
	
}
