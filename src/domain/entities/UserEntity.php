<?php

namespace yii2bundle\telegram\domain\entities;

use yii\helpers\ArrayHelper;
use yii2rails\domain\BaseEntity;

/**
 * Class UserEntity
 * 
 * @package yii2bundle\telegram\domain\entities
 * 
 * @property $id
 * @property $bot_id
 * @property $user_id
 * @property $username
 * @property $first_name
 * @property $is_bot
 * @property $state
 * @property $session
 * @property $settings
 * @property $assignments
 * @property $roles
 */
class UserEntity extends BaseEntity {

	protected $id;
    protected $bot_id;
    protected $user_id;
	protected $username;
	protected $first_name;
	protected $is_bot;
	protected $state = 'default';
	protected $session = '{}';
	protected $settings = '{}';
    protected $assignments;
    protected $roles;

    public function getRoles() {
        if(empty($this->assignments)) {
            return null;
        }
        return ArrayHelper::getColumn($this->assignments, 'role_name');
    }

}
