<?php

namespace yii2bundle\telegram\services;

use yii2bundle\telegram\interfaces\services\ActionInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class ActionService
 * 
 * @package yii2bundle\telegram\services
 * 
 * @property-read \yii2bundle\telegram\Domain $domain
 * @property-read \yii2bundle\telegram\interfaces\repositories\ActionInterface $repository
 */
class ActionService extends BaseActiveService implements ActionInterface {

}
