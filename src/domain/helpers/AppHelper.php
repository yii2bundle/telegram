<?php

namespace yii2bundle\telegram\domain\helpers;

use yii2bundle\telegram\domain\entities\BotEntity;
use yii2bundle\telegram\domain\libs\RouteCollection;
use yii2bundle\telegram\domain\routes\RegexpRoute;
use yii2bundle\telegram\domain\actions\ShowTextAction;
use domain\shop\helpers\RouteHelper;
use yii2rails\extension\yii\helpers\ArrayHelper;
use yii2rails\extension\common\helpers\StringHelper;

class AppHelper {

    public static function forgeRoutesFromRouteCollection($routeCollection, $routes = []) {
        foreach ($routeCollection as $routeEntity) {
            $route = [
                'class' => $routeEntity->class,
                'handler' => [
                    'class' => $routeEntity->action->class,
                ],
            ];
            if($routeEntity->params) {
                foreach ($routeEntity->params as $k => $v) {
                    $route[$k] = $v;
                }
            }
            if($routeEntity->action_params) {
                foreach ($routeEntity->action_params as $k => $v) {
                    $route['handler'][$k] = $v;
                }
            }
            $routes[] = $route;
        }
        return $routes;
    }

    public static function forgeBotEntityFromToken($botToken) : BotEntity {
        $arr = explode(':', $botToken);
        $botId = intval($arr[0]);
        $botEntity = new BotEntity;
        $botEntity->id = $botId;
        $botEntity->token = $botToken;
        return $botEntity;
    }

    /*public static function getBotTdFromUri($uri) {
        if(preg_match('#(\d+)$#i', $uri, $matches)) {
            d($matches);
            $botId = intval($matches[1]);
            return $bod;
        }
        return null;
    }

    /*public static function dialogToRoutes($dialogCollection) {
        $dialog = ArrayHelper::map($dialogCollection, 'route', 'answer');
        $routeCollection = new RouteCollection;
        $routeCollection->load($dialog);

        $routes = RouteHelper::getRoutes();
        foreach ($routes as $k => $v) {
            $routeCollection->add($k, $v);
        }

        //d($routeCollection);

        $routes = AppHelper::dialogCollectionToRoutes($routeCollection);
        //d($routes);
        return $routes;
    }

    public static function dialogCollectionToRoutes(RouteCollection $routeCollection) {
        $dialog = $routeCollection->all();
        $handlers = [];
        foreach($dialog as $requestText => $answerText) {
            $exp = StringHelper::removeDoubleSpace($requestText);
            $exp = str_replace(' ', '\s+', $exp);

            if(is_string($answerText)) {
                $handler = [
                    'class' => ShowTextAction::class,
                    'text' => $answerText,
                ];
            } else {
                $handler = $answerText;
            }

            $route = [
                'class' => RegexpRoute::class,
                'exp' => $exp,
                'handler' => $handler,
            ];
            $handlers[$requestText] = $route;
        }

        foreach($dialog as $requestText => $answerText) {
            $exp = StringHelper::removeDoubleSpace($requestText);
            $exp = str_replace(' ', '\s+', $exp);

            if(is_string($answerText)) {
                $handler = [
                    'class' => ShowTextAction::class,
                    'text' => $answerText,
                ];
            } else {
                $handler = $answerText;
            }

            $route = [
                'class' => RegexpRoute::class,
                'exp' => $exp,
                'handler' => $handler,
            ];
            $handlers[$requestText] = $route;
        }
        return $handlers;
    }*/
	
}
