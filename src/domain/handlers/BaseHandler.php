<?php

namespace yii2bundle\telegram\domain\handlers;

use yii2bundle\telegram\domain\libs\AppLib;
use yii2bundle\telegram\domain\services\AppService;

abstract class BaseHandler {

    /**
     * @var AppLib
     */
	protected $app;

	public function __construct(AppService $app) {
		$this->app = $app;
	}

}