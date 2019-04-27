<?php

namespace yii2bundle\telegram\domain\actions;

use yii2bundle\telegram\domain\handlers\BaseHandler;
use TelegramBot\Api\Types\Message;

abstract class BaseAction extends BaseHandler {

    abstract public function run(Message $message);

}
