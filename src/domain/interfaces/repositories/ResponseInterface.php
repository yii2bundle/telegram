<?php

namespace yii2bundle\telegram\domain\interfaces\repositories;

use yii2bundle\telegram\domain\entities\command\BaseCommandEntity;
use yii2bundle\telegram\domain\libs\AppLib;
use TelegramBot\Api\Types\Message;
use yii2bundle\telegram\domain\services\AppService;

/**
 * Interface ResponseInterface
 * 
 * @package yii2bundle\telegram\domain\interfaces\repositories
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property $columns
 */
interface ResponseInterface {

    public function send(BaseCommandEntity $commandEntity);

}
