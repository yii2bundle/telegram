<?php

use yii\helpers\ArrayHelper;
use yii2rails\domain\helpers\DomainHelper;
use yii2bundle\telegram\domain\libs\AppLib;
use yii2bundle\telegram\domain\helpers\AppHelper;
use yii2rails\domain\enums\Driver;

$domainDefinition = DomainHelper::getClassConfig('telegram', 'yii2bundle\telegram\domain\Domain', [
    'repositories' => [
        //'response' => 'telegram',
        'response' => 'http',
    ],
]);
App::$domain->set('telegram', $domainDefinition);

$botToken = ArrayHelper::getValue($_GET, 'token');

if(empty($botToken)) {
    throw new \Exception('Empty bot token!');
}

$botEntity = \App::$domain->telegram->bot->oneByParam($botToken);
$app = new AppLib($botEntity);
$routeCollection = \App::$domain->telegram->route->allByBotId($app->botId, $app->userEntity->state);
$routes = AppHelper::forgeRoutesFromRouteCollection($routeCollection);
$app->setRoutes($routes);
$app->run();
