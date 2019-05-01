<?php

namespace yii2bundle\telegram\domain\repositories\telegram;

use yii2bundle\telegram\domain\entities\command\BaseCommandEntity;
use yii2bundle\telegram\domain\entities\command\MessageCommandEntity;
use yii2bundle\telegram\domain\entities\command\PhotoCommandEntity;
use yii2bundle\telegram\domain\helpers\MenuHelper;
use yii2bundle\telegram\domain\interfaces\repositories\ResponseInterface;
use yii2bundle\telegram\domain\libs\AppLib;
use TelegramBot\Api\Types\Message;
use yii2rails\domain\repositories\BaseRepository;

/**
 * Class ResponseRepository
 * 
 * @package yii2bundle\telegram\domain\repositories\telegram
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 */
class ResponseRepository extends BaseRepository implements ResponseInterface {

    public function send(BaseCommandEntity $commandEntity) {
        $bot = \App::$domain->telegram->app->bot;
        return Message::fromResponse($bot->call($commandEntity->command(), $commandEntity->toArray()));
    }

}
