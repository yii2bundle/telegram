<?php

namespace yii2bundle\telegram\domain\services;

use yii2bundle\telegram\domain\interfaces\services\ResponseInterface;
use yii2rails\domain\services\base\BaseService;
use yii2bundle\telegram\domain\entities\command\MessageCommandEntity;
use yii2bundle\telegram\domain\entities\command\PhotoCommandEntity;
use yii2bundle\telegram\domain\helpers\MenuHelper;
use yii2bundle\telegram\domain\libs\AppLib;
use TelegramBot\Api\Types\Message;
use yii2rails\domain\repositories\BaseRepository;

/**
 * Class ResponseService
 * 
 * @package yii2bundle\telegram\domain\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\ResponseInterface $repository
 */
class ResponseService extends BaseService implements ResponseInterface {

    public function sendMessage(Message $message, $answerText) {
        $commandEntity = new MessageCommandEntity;
        $commandEntity->chat_id = $message->getChat()->getId();
        $commandEntity->text = $answerText;
        $commandEntity->parse_mode = 'markdown';
        return $this->repository->send($commandEntity);
    }

    public function sendKeyboard(Message $message, $answerText, $keys, $columns = 3) {
        $commandEntity = new MessageCommandEntity;
        $commandEntity->chat_id = $message->getChat()->getId();
        $commandEntity->text = $answerText;
        $commandEntity->parse_mode = 'markdown';
        $commandEntity->setKeyboard($keys, $columns);
        return $this->repository->send($commandEntity);
    }

    public function sendImage(Message $message, $photo, $caption = null, $replyToMessageId = null, $replyMarkup = null, $disableNotification = false, $parseMode = null) {
        $commandEntity = new PhotoCommandEntity;
        $commandEntity->chat_id = $message->getChat()->getId();
        $commandEntity->photo = $photo;
        $commandEntity->caption = $caption;
        return $this->repository->send($commandEntity);
    }

}
