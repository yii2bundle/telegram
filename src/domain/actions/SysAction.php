<?php

namespace yii2bundle\telegram\domain\actions;

use TelegramBot\Api\Types\Message;

class SysAction extends BaseAction {
	
	public function run(Message $message) {
		$cid = $message->getChat()->getId();
        $uid = $message->getFrom()->getId();
        \App::$domain->telegram->app->response->sendMessage($message, 'chat id: ' . $cid . PHP_EOL . 'user id: ' . $uid);

	}
	
}
