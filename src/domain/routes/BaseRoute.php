<?php

namespace yii2bundle\telegram\domain\routes;

use TelegramBot\Api\Types\Message;
use yii2rails\extension\common\helpers\ClassHelper;
use yii2bundle\telegram\domain\handlers\BaseHandler;

abstract class BaseRoute extends BaseHandler {
	
	public $exp;
    public $params;
	public $handler;
    public $action;

    public function run(Message $message) {
        $handlerInstance = ClassHelper::createObject($this->action, [$this->app]);
        $handlerInstance->run($message);
    }

    abstract function isMatch(Message $message);

}
