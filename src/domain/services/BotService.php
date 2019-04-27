<?php

namespace yii2bundle\telegram\services;

use yii2bundle\telegram\interfaces\services\BotInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class BotService
 * 
 * @package yii2bundle\telegram\services
 * 
 * @property-read \yii2bundle\telegram\Domain $domain
 * @property-read \yii2bundle\telegram\interfaces\repositories\BotInterface $repository
 */
class BotService extends BaseActiveService implements BotInterface {

}
