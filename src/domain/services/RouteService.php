<?php

namespace yii2bundle\telegram\services;

use yii2bundle\telegram\interfaces\services\RouteInterface;
use yii2rails\domain\data\Query;
use yii2rails\domain\services\base\BaseActiveService;
use yii2rails\extension\common\enums\StatusEnum;

/**
 * Class RouteService
 * 
 * @package yii2bundle\telegram\services
 * 
 * @property-read \yii2bundle\telegram\Domain $domain
 * @property-read \yii2bundle\telegram\interfaces\repositories\RouteInterface $repository
 */
class RouteService extends BaseActiveService implements RouteInterface {

    public function allByBotId($botId, $state) {
        $query = new Query;
        $query->andWhere([
            'bot_id' => $botId,
            'status' => StatusEnum::ENABLE,
            'state' => $state,
        ]);
        $query->orderBy(['sort' => SORT_ASC]);
        $query->with(['action']);
        return $this->all($query);
    }

}
