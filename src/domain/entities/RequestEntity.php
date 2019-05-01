<?php

namespace yii2bundle\telegram\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class RequestEntity
 * 
 * @package yii2bundle\telegram\domain\entities
 *
 * @property $update_id
 * @property MessageEntity $message
 */
class RequestEntity extends BaseEntity {

    protected $update_id;
	protected $message;

	public function fieldType()
    {
        return [
            'message' => MessageEntity::class,
        ];
    }

}
