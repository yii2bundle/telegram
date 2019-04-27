<?php

namespace yii2bundle\telegram\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class BotEntity
 * 
 * @package yii2bundle\telegram\domain\entities
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
