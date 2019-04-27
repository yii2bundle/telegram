<?php

use yii\helpers\ArrayHelper;
use yii2rails\domain\helpers\DomainHelper;
use yii2bundle\telegram\domain\libs\AppLib;
use yii2bundle\telegram\domain\helpers\AppHelper;

DomainHelper::forgeDomains([
    'telegram' => 'yii2bundle\telegram\domain\Domain',
]);

$botToken = ArrayHelper::getValue($_GET, 'token');

if(empty($botToken)) {
    throw new \Exception('Empty bot token!');
}
$app = new AppLib($botToken);
$routeCollection = \App::$domain->telegram->route->allByBotId($app->botId, $app->userEntity->state);
$routes = AppHelper::forgeRoutesFromRouteCollection($routeCollection);
$app->setRoutes($routes);
$app->run();
