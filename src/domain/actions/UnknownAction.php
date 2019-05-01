<?php

namespace yii2bundle\telegram\domain\actions;

use TelegramBot\Api\Types\Message;

class UnknownAction extends BaseAction {
	
	public $text = 'я не поняла, что ты сказал';
    public $keyboard = ['добавить выражение', 'добавить меню'];
	
	public function run(Message $message) {
        $expression = $message->getText();
        \App::$domain->telegram->session->set('dialog.expression', $expression);
        \App::$domain->telegram->response->sendKeyboard($message, $this->text, $this->keyboard);
	}
	
}
