<?php

namespace yii2bundle\telegram\domain\helpers;

use yii2bundle\telegram\domain\entities\BotEntity;
use yii2bundle\telegram\domain\entities\RouteEntity;
use yii2bundle\telegram\domain\libs\RouteCollection;
use yii2bundle\telegram\domain\routes\RegexpRoute;
use yii2bundle\telegram\domain\actions\ShowTextAction;
use domain\shop\helpers\RouteHelper;
use yii2rails\extension\yii\helpers\ArrayHelper;
use yii2rails\extension\common\helpers\StringHelper;

class AppHelper {

    public static function forgeRoutesFromRouteCollection($routeCollection, $routes = []) {
        foreach ($routeCollection as $routeEntity) {
            $routes[] = self::forgeRoute($routeEntity);
        }
        return $routes;
    }

    private static function forgeRouteDefinition(RouteEntity $routeEntity) {
        $route = [
            'class' => $routeEntity->class,
        ];
        if($routeEntity->params) {
            foreach ($routeEntity->params as $k => $v) {
                $route[$k] = $v;
            }
        }
        return $route;
    }

    private static function forgeActionDefinition(RouteEntity $routeEntity) {
        $action = [];
        $actionClass = ArrayHelper::getValue($routeEntity, 'action.class');
        if($actionClass) {
            $action['class'] = $actionClass;
        }
        if($routeEntity->action_params) {
            foreach ($routeEntity->action_params as $k => $v) {
                $action[$k] = $v;
            }
        }
        return $action;
    }

    private static function forgeRoute(RouteEntity $routeEntity) {
        $route = self::forgeRouteDefinition($routeEntity);
        $route['action'] = self::forgeActionDefinition($routeEntity);
        return $route;
    }

}
