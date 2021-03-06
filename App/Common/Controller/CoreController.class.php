<?php

/*
 * 核心控制器
 */
namespace Common\Controller;

use Think\Controller;

class CoreController extends Controller {
	/**
	 * 后台控制器初始化
	 */
	protected function _initialize() {
		$config = S ( 'DB_CONFIG_DATA' );
		if (! $config) {
			$config = M ( 'Config' )->getField ( 'name,value' );
			S ( 'DB_CONFIG_DATA', $config );
		}
		C ( $config );
		$this->assign ( 'Config', $config );
		if (session ( C ( 'AUTH_KEY' ) ) > 0) {
			$userinfo = session ( 'userinfo' );
			$this->assign ( 'userinfo', $userinfo );
		}
	}
}
