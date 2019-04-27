<?php

namespace yii2bundle\telegram\domain\interfaces\services;

use yii2rails\domain\interfaces\services\CrudInterface;

/**
 * Interface BotInterface
 * 
 * @package yii2bundle\telegram\domain\interfaces\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\BotInterface $repository
 */
interface BotInterface extends CrudInterface {

}
