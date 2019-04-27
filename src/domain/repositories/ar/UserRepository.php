<?php

namespace yii2bundle\telegram\repositories\ar;

use yii2bundle\telegram\interfaces\repositories\UserInterface;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class UserRepository
 * 
 * @package yii2bundle\telegram\repositories\ar
 * 
 * @property-read \yii2bundle\telegram\Domain $domain
 */
class UserRepository extends BaseActiveArRepository implements UserInterface {

	protected $schemaClass = true;
	protected $primaryKey = null;

    public function tableName() {
        return 'telegram_user';
    }

}
