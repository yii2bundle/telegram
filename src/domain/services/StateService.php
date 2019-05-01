<?php

namespace yii2bundle\telegram\domain\services;

use TelegramBot\Api\BotApi;
use TelegramBot\Api\Client;
use yii\web\NotFoundHttpException;
use yii2bundle\telegram\domain\entities\BotEntity;
use yii2bundle\telegram\domain\entities\UserEntity;
use yii2bundle\telegram\domain\enums\StateEnum;
use yii2bundle\telegram\domain\interfaces\services\UserInterface;
use yii2rails\domain\services\base\BaseService;
use yii\helpers\ArrayHelper;
use yii2bundle\telegram\domain\helpers\AppHelper;
use yii2bundle\telegram\domain\interfaces\repositories\ResponseInterface;
use TelegramBot\Api\Types\Message;
use TelegramBot\Api\Types\Update;
use yii2bundle\telegram\domain\routes\BaseRoute;
use yii2rails\extension\common\helpers\ClassHelper;

/**
 * Class StateService
 * 
 * @package yii2bundle\telegram\domain\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\StateInterface $repository
 */
class StateService extends BaseService /*implements StateInterface*/ {

    public function set($state) {
        \App::$domain->telegram->app->userEntity->state = $state;
        \App::$domain->telegram->user->update(\App::$domain->telegram->app->userEntity);
    }

    public function get() {
        return \App::$domain->telegram->app->userEntity->state;
    }

    public function clear() {
        $this->setState(StateEnum::DEFAULT);
    }

}
