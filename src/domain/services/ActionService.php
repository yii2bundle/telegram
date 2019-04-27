<?php

namespace yii2bundle\telegram\domain\services;

use yii2bundle\telegram\domain\interfaces\services\ActionInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class ActionService
 * 
 * @package yii2bundle\telegram\domain\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\ActionInterface $repository
 */
class ActionService extends BaseActiveService implements ActionInterface {

}
