<?php

namespace yii2bundle\telegram\domain\repositories\http;

use yii\helpers\ArrayHelper;
use yii2bundle\telegram\domain\helpers\MockResponseHelper;
use yii2bundle\telegram\domain\interfaces\repositories\ResponseInterface;
use yii2bundle\telegram\domain\libs\AppLib;
use TelegramBot\Api\Types\Message;
use yii2rails\domain\repositories\BaseRepository;

/**
 * Class ResponseRepository
 * 
 * @package yii2bundle\telegram\domain\repositories\http
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
        $this->sendResponse('sendMessage', $message, [
            'answerText' => $answerText,
        ]);
    }

    public function sendKeyboard(Message $message, $answerText, $keys) {
        $this->sendResponse('sendKeyboard', $message, [
            'answerText' => $answerText,
            'keys' => $keys,
        ]);
    }

    public function sendImage(Message $message, $photo, $caption = null, $replyToMessageId = null, $replyMarkup = null, $disableNotification = false, $parseMode = null) {
        $this->sendResponse('sendKeyboard', $message, [
            'photo' => $photo,
            'caption' => $caption,
            'replyToMessageId' => $replyToMessageId,
            'replyMarkup' => $replyMarkup,
            'disableNotification' => $disableNotification,
            'parseMode' => $parseMode,
        ]);
    }

    private function sendResponse($name, Message $request, $response) {
        $messageArray = ArrayHelper::toArray(json_decode($request->toJson()));
        $responseData = [
            'method' => 'sendMessage',
            'response' => $response,
            'request' => $messageArray,
        ];
        $body = json_encode($responseData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        echo $body;
    }

}
