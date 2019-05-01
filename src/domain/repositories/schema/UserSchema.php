<?php

namespace yii2bundle\telegram\domain\repositories\schema;

use yii2rails\domain\enums\RelationEnum;
use yii2rails\domain\repositories\relations\BaseSchema;

/**
 * Class UserSchema
 * 
 * @package yii2bundle\telegram\domain\repositories\schema
 * 
 */
class UserSchema extends BaseSchema {

    public function relations() {
        return [
            'assignments' => [
                'type' => RelationEnum::MANY,
                'field' => 'id',
                'foreign' => [
                    'id' => 'telegram.userAssignment',
                    'field' => 'user_id',
                ],
            ],
        ];
    }

}
