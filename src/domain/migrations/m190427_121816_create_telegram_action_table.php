<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190427_121816_create_telegram_action_table
 * 
 * @package 
 */
class m190427_121816_create_telegram_action_table extends Migration {

	public $table = 'telegram_action';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'class' => $this->string()->notNull(),
			'params' => $this->string()->notNull()->defaultValue('{}'),
			'status' => $this->integer()->notNull()->defaultValue(1),
		];
	}

	public function afterCreate()
	{
		
	}

}