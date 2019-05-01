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
 * Class AppService
 * 
 * @package yii2bundle\telegram\domain\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\AppInterface $repository
 */
class AppService extends BaseService /*implements AppInterface*/ {

    /**
     * @var BotApi
     */
    public $bot;
    public $botId;
    private $routes;

    /**
     * @var UserEntity
     */
    public $userEntity;

    public function setBot(BotEntity $botEntity) {
        $this->botId = $botEntity->id;
        $this->bot = new Client($botEntity->token);

        $req = file_get_contents('php://input');
        $request = \GuzzleHttp\json_decode($req);
        $this->userEntity = \App::$domain->telegram->user->oneByFrom($request->message->from, $this->botId);

        try {
            \App::$domain->telegram->bot->oneById($botEntity->id);
        } catch (NotFoundHttpException $e) {
            throw new NotFoundHttpException('Bot not found!', 0, $e);
        }
    }

    public function can($roles) {
        $roles = ArrayHelper::toArray($roles);
        foreach ($roles as $role) {
            if(in_array($role, \App::$domain->telegram->app->userEntity->roles)) {
                return true;
            }
        }
        return false;
    }

    public function setRoutes($routes) {
        $this->routes = $routes;
        // Отлов любых сообщений + обработка reply-кнопок
        $this->bot->on($this->onUpdateClosure(), function(Update $message) {
            return true; // когда тут true - команда проходит
        });
    }

    public function run() {
        $this->bot->run();
    }

    public function onUpdateClosure() {
        return function(Update $update) {
            $message = $update->getMessage();
            $this->handleMessage($message);
        };
    }

    public function handleMessage(Message $message) {
        foreach($this->routes as $pattern => $route) {
            /** @var BaseRoute $handlerInstace */
            $handlerInstace = ClassHelper::createObject($route, [$this]);
            $handlerInstace->name = $pattern;
            if($handlerInstace->isMatch($message)) {
                $handlerInstace->run($message);
                return;
            }
        }
    }

}
