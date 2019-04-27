<?php

namespace yii2bundle\telegram\domain\interfaces\services;

use yii2rails\domain\interfaces\services\CrudInterface;

/**
 * Interface UserInterface
 * 
 * @package yii2bundle\telegram\domain\interfaces\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\UserInterface $repository
 */
interface UserInterface extends CrudInterface {

    public function updateState($userId, $botId, $state);
    public function oneByFrom($from, $botId);

}
