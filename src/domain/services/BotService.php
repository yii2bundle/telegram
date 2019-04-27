<?php

namespace yii2bundle\telegram\domain\services;

use yii2bundle\telegram\domain\interfaces\services\BotInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class BotService
 * 
 * @package yii2bundle\telegram\domain\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\BotInterface $repository
 */
class BotService extends BaseActiveService implements BotInterface {

}
