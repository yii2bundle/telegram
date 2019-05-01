<?php

namespace yii2bundle\telegram\domain\repositories\telegram;

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

    public function setApp(AppLib $app) {
        $this->app = $app;
    }

    public function sendMessage(Message $message, $answerText) {
        $cid = $message->getChat()->getId();
        return $this->app->bot->sendMessage($cid, $answerText, 'markdown', true);
    }

    public function sendKeyboard(Message $message, $answerText, $keys, $columns = 3) {
        $cid = $message->getChat()->getId();
        $keyboard = MenuHelper::createKeyboard($keys, $columns);
        return $this->app->bot->sendMessage($cid, $answerText, 'markdown', null,null, $keyboard);
    }

    public function sendImage(Message $message, $photo, $caption = null, $replyToMessageId = null, $replyMarkup = null, $disableNotification = false, $parseMode = null) {
        $cid = $message->getChat()->getId();
        return $this->app->bot->sendPhoto($cid, $photo, $caption, $replyToMessageId, $replyMarkup, $disableNotification, $parseMode);
    }

}
