<?php

namespace yii2bundle\telegram\domain\actions;

use TelegramBot\Api\Types\Message;
use yii2rails\extension\common\helpers\StringHelper;

class MemoryAction extends BaseAction {
	
	public $text;
	public $exp = 'запомни\s+(.+)\s*\-\s*(.+)';
	
	public function run(Message $message) {
        $expression = \App::$domain->telegram->session->get('dialog.expression');
        $expression = $this->normalizeExpression($expression);
	     if(\App::$domain->telegram->state->get() == 'default') {
             \App::$domain->telegram->state->set('dialog.expression');
             $text = 'Введите ответ на фразу: "' . $expression . '""';
             //\App::$domain->telegram->app->response->sendMessage($message, $text);
             \App::$domain->telegram->app->response->sendKeyboard($message, $text, ['отмена']);
         } elseif (\App::$domain->telegram->state->get() == 'dialog.expression') {
             $answer = $message->getText();
             $answer = StringHelper::removeDoubleSpace($answer);
             $answer = trim($answer);
             $expression = str_replace(SPC, '|', $expression);
             \App::$domain->telegram->route->create([
                 'bot_id' => \App::$domain->telegram->app->botId,
                 'class' => 'yii2bundle\telegram\domain\routes\InArrayRoute',
                 'expression' => $expression,
                 'action_id' => 1,
                 'action_params_json' => '{"text": "' . $answer . '"}',
             ]);
             \App::$domain->telegram->app->response->sendMessage($message, '✅ запомнила');
             \App::$domain->telegram->state->clear();
         }
	}

	private function normalizeExpression($expression) {
        $expression = StringHelper::removeDoubleSpace($expression);
        $expression = trim($expression);
        $expression = mb_strtolower($expression);
        return $expression;
    }

}
