<?php

namespace yii2bundle\telegram\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class ActionEntity
 * 
 * @package yii2bundle\telegram\domain\entities
 * 
 * @property $id
 * @property $class
 * @property $params
 * @property $status
 */
class ActionEntity extends BaseEntity {

	protected $id;
	protected $class;
	protected $params;
    protected $status;
}
