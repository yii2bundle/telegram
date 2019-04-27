<?php

namespace yii2bundle\telegram\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class ResponseEntity
 * 
 * @package yii2bundle\telegram\domain\entities
 * 
 * @property $message
 * @property $message_text
 */
class ResponseEntity extends BaseEntity {

	protected $message;
	protected $message_text;

}
