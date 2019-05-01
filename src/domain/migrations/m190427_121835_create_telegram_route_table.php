<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190427_121835_create_telegram_route_table
 * 
 * @package 
 */
class m190427_121835_create_telegram_route_table extends Migration {

	public $table = 'telegram_route';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'bot_id' => $this->integer()->notNull(),
			'state' => $this->string(),
			'sort' => $this->integer()->notNull()->defaultValue(100),
			'class' => $this->string()->notNull(),
			'expression' => $this->string(),
			'params_json' => $this->string()->notNull(),
			'action_id' => $this->integer()->null(),
			'action_params_json' => $this->string()->notNull(),
			'status' => $this->integer()->notNull()->defaultValue(1),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'action_id',
			'telegram_action',
			'id',
			'CASCADE',
			'CASCADE'
		);
		$this->myAddForeignKey(
			'bot_id',
			'telegram_bot',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}