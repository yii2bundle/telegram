<?php

namespace yii2bundle\telegram\domain\entities\command;

use TelegramBot\Api\Types\Message;
use yii2bundle\telegram\domain\helpers\MenuHelper;
use yii2rails\domain\BaseEntity;

/**
 * @property $chat_id
 * @property $text
 * @property $parse_mode
 * @property $disable_web_page_preview
 * @property $reply_to_message_id
 * @property $reply_markup
 * @property $disable_notification
 */
class MessageCommandEntity extends BaseEntity {

    protected $chat_id;
    protected $text;
    protected $parse_mode = null;
    protected $disable_web_page_preview = false;
    protected $reply_to_message_id = null;
    protected $reply_markup = null;
    protected $disable_notification = false;

    public function command() {
        return 'sendMessage';
    }

    public function setKeyboard($keys, $columns = 1) {
        $this->reply_markup = MenuHelper::createKeyboard($keys, $columns);
    }

    public function getReplyMarkup() {
        return is_null($this->reply_markup) ? $this->reply_markup : $this->reply_markup->toJson();
    }

}
