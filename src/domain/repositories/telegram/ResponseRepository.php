<?php

namespace yii2bundle\telegram\domain\repositories\telegram;

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

    /**
     * @var AppLib
     */
    protected $app;
    public $columns = 3;

    public function setApp(/*AppLib*/ $app) {
        $this->app = $app;
    }

    public function send($commandEntity) {
        $bot = \App::$domain->telegram->app->bot;
        return Message::fromResponse($bot->call($commandEntity->command(), $commandEntity->toArray()));
    }

    public function sendMessage(Message $message, $answerText) {
        $commandEntity = new MessageCommandEntity;
        $commandEntity->chat_id = $message->getChat()->getId();
        $commandEntity->text = $answerText;
        $commandEntity->parse_mode = 'markdown';
        return $this->send($commandEntity);
    }

    public function sendKeyboard(Message $message, $answerText, $keys, $columns = 3) {
        $commandEntity = new MessageCommandEntity;
        $commandEntity->chat_id = $message->getChat()->getId();
        $commandEntity->text = $answerText;
        $commandEntity->parse_mode = 'markdown';
        $commandEntity->setKeyboard($keys, $columns);
        return $this->send($commandEntity);
    }

    public function sendImage(Message $message, $photo, $caption = null, $replyToMessageId = null, $replyMarkup = null, $disableNotification = false, $parseMode = null) {
        $commandEntity = new PhotoCommandEntity;
        $commandEntity->chat_id = $message->getChat()->getId();
        $commandEntity->photo = $photo;
        $commandEntity->caption = $caption;
        return $this->send($commandEntity);
   }

}
