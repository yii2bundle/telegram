<?php

namespace yii2bundle\telegram\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class UserAssignmentEntity
 * 
 * @package yii2bundle\telegram\domain\entities
 * 
 * @property $user_id
 * @property $role_name
 */
class UserAssignmentEntity extends BaseEntity {

	protected $user_id;
    protected $role_name;

}
