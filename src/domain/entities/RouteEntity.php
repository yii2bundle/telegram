<?php

namespace yii2bundle\telegram\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class RouteEntity
 * 
 * @package yii2bundle\telegram\domain\entities
 * 
 * @property $id
 * @property $bot_id
 * @property $state
 * @property $sort
 * @property $class
 * @property $expression
 * @property $params
 * @property $params_json
 * @property $action_params
 * @property $action_params_json
 * @property $status
 */
class RouteEntity extends BaseEntity {

	protected $id;
	protected $bot_id;
    protected $state = 'default';
    protected $sort = 100;
	protected $class = 'yii2bundle\telegram\domain\routes\RegexpRoute';
    protected $expression;
	protected $params;
    protected $params_json = '{}';
	protected $action_params;
    protected $action_params_json = '{}';
    protected $status = 1;

    public function getParams() {
        $params = json_decode($this->params_json);
        if($this->expression) {
            $params->exp = $this->expression;
        }
        return (array) $params;
    }

    public function getActionParams() {
        return (array) json_decode($this->action_params_json);
    }
}
