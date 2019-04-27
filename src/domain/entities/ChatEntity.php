<?php

namespace yii2bundle\telegram\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class ChatEntity
 * 
 * @package yii2bundle\telegram\domain\entities
 * 
 * @property $id
 * @property $first_name
 * @property $username
 * @property $type
 */
class ChatEntity extends BaseEntity {

	protected $id;
	protected $first_name;
	protected $username;
	protected $type;

}
