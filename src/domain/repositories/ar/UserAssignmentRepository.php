<?php

namespace yii2bundle\telegram\domain\repositories\ar;

use yii2bundle\telegram\domain\interfaces\repositories\UserAssignmentInterface;
use yii2rails\domain\data\Query;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class UserAssignmentRepository
 * 
 * @package yii2bundle\telegram\domain\repositories\ar
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 */
class UserAssignmentRepository extends BaseActiveArRepository implements UserAssignmentInterface {

	protected $schemaClass = true;
	protected $primaryKey = null;

    public function tableName() {
        return 'telegram_user_assignment';
    }

    public function oneByParams($userId, $roleName) {
        $query = new Query;
        $query->andWhere([
            'user_id' => $userId,
            'role_name' => $roleName,
        ]);
        return $this->one($query);
    }

}
