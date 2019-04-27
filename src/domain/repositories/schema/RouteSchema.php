<?php

namespace yii2bundle\telegram\repositories\schema;

use yii2rails\domain\enums\RelationEnum;
use yii2rails\domain\repositories\relations\BaseSchema;

/**
 * Class RouteSchema
 * 
 * @package yii2bundle\telegram\repositories\schema
 * 
 */
class RouteSchema extends BaseSchema {

    public function relations()
    {
        return [
            'action' => [
                'type' => RelationEnum::ONE,
                'field' => 'action_id',
                'foreign' => [
                    'id' => 'telegram.action',
                    'field' => 'id',
                ],
            ],
        ];
    }

}
