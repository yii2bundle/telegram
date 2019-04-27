<?php

namespace yii2bundle\telegram\interfaces\services;

use yii2bundle\telegram\entities\RouteEntity;
use yii2rails\domain\interfaces\services\CrudInterface;

/**
 * Interface RouteInterface
 * 
 * @package yii2bundle\telegram\interfaces\services
 * 
 * @property-read \yii2bundle\telegram\Domain $domain
 * @property-read \yii2bundle\telegram\interfaces\repositories\RouteInterface $repository
 */
interface RouteInterface extends CrudInterface {

    /**
     * @param $botId
     * @return RouteEntity[]
     */
    public function allByBotId($botId, $state);
}
