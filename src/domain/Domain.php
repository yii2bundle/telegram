<?php

namespace yii2bundle\telegram\domain;

use yii2rails\domain\enums\Driver;

/**
 * Class Domain
 * 
 * @package yii2bundle\telegram\domain
 * @property-read \yii2bundle\telegram\domain\interfaces\services\BotInterface $bot
 * @property-read \yii2bundle\telegram\domain\interfaces\repositories\RepositoriesInterface $repositories
 * @property-read \yii2bundle\telegram\domain\interfaces\services\RouteInterface $route
 * @property-read \yii2bundle\telegram\domain\interfaces\services\ActionInterface $action
 * @property-read \yii2bundle\telegram\domain\interfaces\services\UserInterface $user
 * @property-read \yii2bundle\telegram\domain\interfaces\services\UserAssignmentInterface $userAssignment
 * @property-read \yii2bundle\telegram\domain\interfaces\services\ResponseInterface $response
 * @property-read \yii2bundle\telegram\domain\services\AppService $app
 * @property-read \yii2bundle\telegram\domain\services\SessionService $session
 * @property-read \yii2bundle\telegram\domain\services\StateService $state
 */
class Domain extends \yii2rails\domain\Domain {
	
	public function config() {
		return [
			'repositories' => [
                'bot' => Driver::ACTIVE_RECORD,
                'route' => Driver::ACTIVE_RECORD,
                'action' => Driver::ACTIVE_RECORD,
                'user' => Driver::ACTIVE_RECORD,
                'userAssignment' => Driver::ACTIVE_RECORD,
                //'response' => 'telegram',
                'response' => 'mock',
			],
			'services' => [
                'bot',
                'route',
                'action',
                'user',
                'response',
                'userAssignment',
                'app',
                'session',
                'state',
			],
		];
	}
	
}