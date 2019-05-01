<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190501_085449_create_telegram_user_assignment_table
 * 
 * @package 
 */
class m190501_085449_create_telegram_user_assignment_table extends Migration {

	public $table = 'telegram_user_assignment';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'user_id' => $this->integer(),
			'role_name' => $this->string(64),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'user_id',
			'telegram_user',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}