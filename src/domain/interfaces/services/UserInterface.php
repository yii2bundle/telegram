<?php

namespace yii2bundle\telegram\interfaces\services;

use yii2rails\domain\interfaces\services\CrudInterface;

/**
 * Interface UserInterface
 * 
 * @package yii2bundle\telegram\interfaces\services
 * 
 * @property-read \yii2bundle\telegram\Domain $domain
 * @property-read \yii2bundle\telegram\interfaces\repositories\UserInterface $repository
 */
interface UserInterface extends CrudInterface {

    public function updateState($userId, $botId, $state);
    public function oneByFrom($from, $botId);

}
