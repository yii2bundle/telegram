<?php

namespace yii2bundle\telegram\domain\interfaces\services;

use TelegramBot\Api\Types\Message;

/**
 * Interface ResponseInterface
 * 
 * @package yii2bundle\telegram\domain\interfaces\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\ResponseInterface $repository
 */
interface ResponseInterface {

    public function sendMessage(Message $message, $answerText);
    public function sendKeyboard(Message $message, $answerText, $keys, $columns = 3);
    public function sendImage(Message $message, $photo, $caption = null, $replyToMessageId = null, $replyMarkup = null, $disableNotification = false, $parseMode = null);

}
