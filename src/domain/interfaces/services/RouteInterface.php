<?php

namespace yii2bundle\telegram\domain\interfaces\services;

use yii2bundle\telegram\domain\entities\RouteEntity;
use yii2rails\domain\interfaces\services\CrudInterface;

/**
 * Interface RouteInterface
 * 
 * @package yii2bundle\telegram\domain\interfaces\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\RouteInterface $repository
 */
interface RouteInterface extends CrudInterface {

    /**
     * @param $botId
     * @return RouteEntity[]
     */
    public function allByBotId($botId, $state);
}
