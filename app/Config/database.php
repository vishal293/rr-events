<?php
class DATABASE_CONFIG {

	public $local = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'rr-events-web',
		'prefix' => '',
		//'encoding' => 'utf8',
	);

	public $sandbox = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'testing',
		'prefix' => '',
		//'encoding' => 'utf8',
	);

	public $citybuzz = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => '172.16.2.167',
		'login' => 'ar2p7t7gtdl2tcuc',
		'password' => 'a2w6nyh2x02bcwl1ykyqxljprxt72yz3',
		'database' => 'rr_events',
		'prefix' => '',
		'port'=>'63198',
		//'encoding' => 'utf8',
	);

	public function __construct(){
		DEFINE ('HOST',$_SERVER['SERVER_NAME']);
		switch (HOST) {
			case 'localhost':
				$this->default = $this->local;
			break;

			case 'sandbox':
				$this->default = $this->sandbox;
			break;

			case 'citybuzz.iab.app42paas.com':
				$this->default = $this->citybuzz;
			break;
			
			default:
				$this->default = $this->local;
				break;
		}
	}
}
