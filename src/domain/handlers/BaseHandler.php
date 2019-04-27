<?php

namespace yii2bundle\telegram\domain\handlers;

use yii2bundle\telegram\domain\libs\AppLib;

abstract class BaseHandler {

    /**
     * @var AppLib
     */
	protected $app;

	public function __construct(AppLib $app) {
		$this->app = $app;
	}

}