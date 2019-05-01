<?php

namespace yii2bundle\telegram\domain\entities\command;

use yii2rails\domain\BaseEntity;

/**
 * @property $chat_id
 */
abstract class BaseCommandEntity extends BaseEntity {

    protected $chat_id;

    abstract public function command();

}
