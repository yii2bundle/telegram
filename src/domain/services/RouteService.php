<?php

namespace yii2bundle\telegram\domain\services;

use yii2bundle\telegram\domain\interfaces\services\RouteInterface;
use yii2rails\domain\data\Query;
use yii2rails\domain\services\base\BaseActiveService;
use yii2rails\extension\common\enums\StatusEnum;

/**
 * Class RouteService
 * 
 * @package yii2bundle\telegram\domain\services
 * 
 * @property-read \yii2bundle\telegram\domain\Domain $domain
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\RouteInterface $repository
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
