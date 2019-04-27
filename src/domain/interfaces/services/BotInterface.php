<?php

namespace yii2bundle\telegram\interfaces\services;

use yii2rails\domain\interfaces\services\CrudInterface;

/**
 * Interface BotInterface
 * 
 * @package yii2bundle\telegram\interfaces\services
 * 
 * @property-read \yii2bundle\telegram\Domain $domain
 * @property-read \yii2bundle\telegram\interfaces\repositories\BotInterface $repository
 */
interface BotInterface extends CrudInterface {

}
