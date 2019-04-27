<?php

namespace yii2bundle\telegram\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class BotEntity
 * 
 * @package yii2bundle\telegram\entities
 * 
 * @property $id
 * @property $username
 * @property $token
 */
class BotEntity extends BaseEntity {

	protected $id;
	protected $username;
	protected $token;

}
