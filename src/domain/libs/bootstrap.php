<?php

use yii\helpers\ArrayHelper;
use yii2rails\domain\helpers\DomainHelper;
use yii2bundle\telegram\domain\libs\AppLib;
use yii2bundle\telegram\domain\helpers\AppHelper;
use yii2rails\domain\enums\Driver;

$domains = include(ROOT_DIR . '/telegram/config/domains.php');
DomainHelper::forgeDomains2($domains);

$botToken = ArrayHelper::getValue($_GET, 'token');
$botEntity = \App::$domain->telegram->bot->oneByParam($botToken);

$app = new AppLib($botEntity);
$routeCollection = \App::$domain->telegram->route->allByBotId($app->botId, $app->userEntity->state);
$defaultRouteCollection = \App::$domain->telegram->route->allByBotId($app->botId, '*');
$routeCollection = ArrayHelper::merge($defaultRouteCollection, $routeCollection);
$routes = AppHelper::forgeRoutesFromRouteCollection($routeCollection);
$app->setRoutes($routes);
$app->run();
