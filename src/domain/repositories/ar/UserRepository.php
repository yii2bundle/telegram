<?php

namespace yii2bundle\telegram\domain\repositories\ar;

use yii2bundle\telegram\domain\interfaces\repositories\UserInterface;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class UserRepository
 * 
 * @package yii2bundle\telegram\domain\repositories\ar
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 */
class UserRepository extends BaseActiveArRepository implements UserInterface {

	protected $schemaClass = true;
	protected $primaryKey = null;

    public function tableName() {
        return 'telegram_user';
    }

}
