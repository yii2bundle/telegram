<?php

namespace yii2bundle\telegram\domain\services;

use yii2bundle\telegram\domain\entities\BotEntity;
use yii2bundle\telegram\domain\interfaces\services\BotInterface;
use yii2rails\domain\data\Query;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class BotService
 * 
 * @package yii2bundle\telegram\domain\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\BotInterface $repository
 */
class BotService extends BaseActiveService implements BotInterface {

    public function oneByParam(string $param) : BotEntity {
        if(is_numeric($param)) {
            $id = intval($param);
            $botEntity = $this->oneById($id);
        } else {
            $botEntity = $this->oneByToken($param);
        }
        return $botEntity;
    }

    public function oneByToken(string $botToken) : BotEntity {
        $query = new Query;
        $query->where(['token' => $botToken]);
        return $this->one($query);
    }

    private function forgeBotEntity($botToken) {
        $params = explode(':', $botToken);
        $botEntity = new BotEntity;
        $botEntity->id = intval($params[0]);
        if (count($params) == 2) {
            $botEntity->token = $botToken;
        }
        return $botEntity;
    }

}
