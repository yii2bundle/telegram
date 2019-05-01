<?php

namespace yii2bundle\telegram\domain\entities\command;

use TelegramBot\Api\Types\Message;
use yii2rails\domain\BaseEntity;

/**
 * @property $chat_id
 * @property $photo
 * @property $caption
 * @property $reply_to_message_id
 * @property $reply_markup
 * @property $disable_notification
 * @property $parse_mode
 */
class PhotoCommandEntity extends BaseEntity {

    protected $chat_id;
    protected $photo;
    protected $caption = null;
    protected $reply_to_message_id = null;
    protected $reply_markup = null;
    protected $disable_notification = false;
    protected $parse_mode = null;

    public function command() {
        return 'sendPhoto';
    }

}
