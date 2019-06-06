<?php

use yii\helpers\ArrayHelper;
use yii2rails\domain\helpers\DomainHelper;
use yii2bundle\telegram\domain\libs\AppLib;
use yii2bundle\telegram\domain\helpers\AppHelper;
use yii2rails\domain\enums\Driver;

$domains = include(ROOT_DIR . '/telegram/config/domains.php');
DomainHelper::forgeDomains2($domains);

$botToken = ArrayHelper::getValue($_GET, 'token');
if(empty($botToken)) {
    throw new \yii\base\InvalidArgumentException('Empty token!');
}
$botEntity = \App::$domain->telegram->bot->oneByParam($botToken);

\App::$domain->telegram->app->setBot($botEntity);
$routeCollection = \App::$domain->telegram->route->allByBotId(\App::$domain->telegram->app->botId, \App::$domain->telegram->app->userEntity->state);
$defaultRouteCollection = \App::$domain->telegram->route->allByBotId(\App::$domain->telegram->app->botId, '*');
$routeCollection = ArrayHelper::merge($defaultRouteCollection, $routeCollection);
$routes = AppHelper::forgeRoutesFromRouteCollection($routeCollection);
\App::$domain->telegram->app->setRoutes($routes);
\App::$domain->telegram->app->run();
