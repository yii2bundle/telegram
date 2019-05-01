<?php

namespace yii2bundle\telegram\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class MessageEntity
 * 
 * @package yii2bundle\telegram\domain\entities
 * 
 * @property $id
 * @property FromEntity $from
 * @property ChatEntity $chat
 * @property $date
 * @property $text
 */
class MessageEntity extends BaseEntity {

	protected $id;
	protected $from;
	protected $chat;
	protected $date;
	protected $text;

    public function fieldType()
    {
        return [
            'from' => FromEntity::class,
            'chat' => ChatEntity::class,
        ];
    }

}
