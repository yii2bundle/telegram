<?php

namespace yii2bundle\telegram\handlers;

use yii2bundle\telegram\libs\AppLib;

abstract class BaseHandler {

    /**
     * @var AppLib
     */
	protected $app;

	public function __construct(AppLib $app) {
		$this->app = $app;
	}

}