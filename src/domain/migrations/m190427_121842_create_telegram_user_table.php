<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190427_121842_create_telegram_user_table
 * 
 * @package 
 */
class m190427_121842_create_telegram_user_table extends Migration {

	public $table = 'telegram_user';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'bot_id' => $this->integer()->notNull(),
			'user_id' => $this->integer()->notNull(),
			'username' => $this->string()->notNull(),
			'first_name' => $this->string()->notNull(),
			'is_bot' => $this->integer()->notNull(),
			'state' => $this->string()->notNull()->defaultValue('default'),
			'session' => $this->string()->notNull()->defaultValue('{}'),
			'settings' => $this->string()->notNull()->defaultValue('{}'),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'bot_id',
			'telegram_bot',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}