<?php

namespace yii2bundle\telegram\domain\routes;

use TelegramBot\Api\Types\Message;

class InArrayRoute extends BaseRoute {

	public function isMatch(Message $message) {
        $text = $message->getText();
	    $exps = explode('|', $this->exp);
	    foreach ($exps as $exp) {
	        if(mb_strpos($text, $exp) === false) {
	            return false;
            }
        }
		return true;
	}

}
