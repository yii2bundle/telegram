<?php

namespace yii2bundle\telegram\actions;

use yii2bundle\telegram\handlers\BaseHandler;
use TelegramBot\Api\Types\Message;

abstract class BaseAction extends BaseHandler {

    abstract public function run(Message $message);

}
