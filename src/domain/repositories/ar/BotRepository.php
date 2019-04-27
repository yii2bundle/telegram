<?php

namespace yii2bundle\telegram\domain\repositories\ar;

use yii2bundle\telegram\domain\interfaces\repositories\BotInterface;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class BotRepository
 * 
 * @package yii2bundle\telegram\domain\repositories\ar
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 */
class BotRepository extends BaseActiveArRepository implements BotInterface {

	protected $schemaClass = true;

	public function tableName() {
        return 'telegram_bot';
    }
}
