<?php

namespace yii2bundle\telegram\services;

use yii2bundle\telegram\interfaces\services\ResponseInterface;
use yii2rails\domain\services\base\BaseService;

/**
 * Class ResponseService
 * 
 * @package yii2bundle\telegram\services
 * 
 * @property-read \yii2bundle\telegram\Domain $domain
 * @property-read \yii2bundle\telegram\interfaces\repositories\ResponseInterface $repository
 */
class ResponseService extends BaseService implements ResponseInterface {

}
