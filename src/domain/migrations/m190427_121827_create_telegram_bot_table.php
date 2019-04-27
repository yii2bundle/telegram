<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190427_121827_create_telegram_bot_table
 * 
 * @package 
 */
class m190427_121827_create_telegram_bot_table extends Migration {

	public $table = 'telegram_bot';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'username' => $this->string()->notNull(),
			'token' => $this->string()->notNull(),
		];
	}

	public function afterCreate()
	{
		
	}

}