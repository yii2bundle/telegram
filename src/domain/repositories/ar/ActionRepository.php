<?php

namespace yii2bundle\telegram\domain\repositories\ar;

use yii2bundle\telegram\domain\interfaces\repositories\ActionInterface;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class ActionRepository
 * 
 * @package yii2bundle\telegram\domain\repositories\ar
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 */
class ActionRepository extends BaseActiveArRepository implements ActionInterface {

	protected $schemaClass = true;

    public function tableName() {
        return 'telegram_action';
    }
}
