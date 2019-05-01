<?php

namespace yii2bundle\telegram\domain\helpers;

use TelegramBot\Api\Types\ReplyKeyboardMarkup;

class MenuHelper {
	
	public static function createKeyboard($keys, $columns = 3) {
		$keyboardArray = MenuHelper::splitButtons($keys, $columns);
		$keyboard = new ReplyKeyboardMarkup($keyboardArray, true, true);
		return $keyboard;
	}
	
	public static function splitButtons($keys, $columns = 3) {
		$current = 0;
		$keyboardArray = [];
		foreach($keys as $k => $text) {
			$keyboardArray[$current][] = $text;
			if(($k + 1) % $columns == 0) {
				$current++;
			}
		}
		return $keyboardArray;
	}
	
}
