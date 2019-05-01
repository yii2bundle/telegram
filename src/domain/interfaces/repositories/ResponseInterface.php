<?php

namespace yii2bundle\telegram\domain\interfaces\repositories;

use yii2bundle\telegram\domain\libs\AppLib;
use TelegramBot\Api\Types\Message;

/**
 * Interface ResponseInterface
 * 
 * @package yii2bundle\telegram\domain\interfaces\repositories
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property $columns
 */
interface ResponseInterface {

    public function setApp(AppLib $app);
    public function sendMessage(Message $message, $answerText);
    public function sendKeyboard(Message $message, $answerText, $keys, $columns = 3);
    public function sendImage(Message $message, $photo, $caption = null, $replyToMessageId = null, $replyMarkup = null, $disableNotification = false, $parseMode = null);

}
