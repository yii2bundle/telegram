<?php

namespace yii2bundle\telegram\domain\services;

use TelegramBot\Api\BotApi;
use TelegramBot\Api\Client;
use yii\web\NotFoundHttpException;
use yii2bundle\telegram\domain\entities\BotEntity;
use yii2bundle\telegram\domain\entities\UserEntity;
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
 * Class SessionService
 * 
 * @package yii2bundle\telegram\domain\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\SessionInterface $repository
 */
class SessionService extends BaseService /*implements SessionInterface*/ {

    public function set($key, $val) {
        $session = $this->get();
        $session[$key] = $val;
        \App::$domain->telegram->app->userEntity->session = json_encode($session);
        \App::$domain->telegram->user->update(\App::$domain->telegram->app->userEntity);
    }

    public function get($key = null) {
        $session = (array) json_decode(\App::$domain->telegram->app->userEntity->session);
        if($key) {
            $session = $session[$key];
        }
        return $session;
    }

    public function clear() {
        \App::$domain->telegram->app->userEntity->session = [];
        \App::$domain->telegram->user->update($this->userEntity);
    }

}
