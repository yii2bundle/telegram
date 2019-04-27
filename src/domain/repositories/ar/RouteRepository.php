<?php

namespace yii2bundle\telegram\repositories\ar;

use yii2bundle\telegram\interfaces\repositories\RouteInterface;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class RouteRepository
 * 
 * @package yii2bundle\telegram\repositories\ar
 * 
 * @property-read \yii2bundle\telegram\Domain $domain
 */
class RouteRepository extends BaseActiveArRepository implements RouteInterface {

	protected $schemaClass = true;

    public function tableName() {
        return 'telegram_route';
    }
}
