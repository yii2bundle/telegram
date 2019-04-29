<?php

namespace yii2bundle\telegram\domain\interfaces\services;

use yii2bundle\telegram\domain\entities\BotEntity;
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

    public function oneByToken(string $botToken) : BotEntity;
    public function oneByParam(string $param) : BotEntity;

}
