<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
	 
	 public $components = array(
						'Session',
						'Auth'=> array(
								'loginRedirect'=>array('controller'=>'dashboards' , 'action'=>'index'),
								'logoutRedirect'=>array('controller'=>'users' , 'action'=>'login'),
								'authError'=>"you can't access that page",
								'authorize'=>array('Controller'),
								'authenticate'=>array(
									'Form'=>array(
										'fields'=>array('username'=>'email'),
										'passwordHasher'=>'Blowfish'
									)
								)
						),
						'Mandrill' => array('key' => 'WRrtKFlxRPRJW7M8SylgHw')						

	);

	public function isAuthorized($user) {
		return true;
	}

	public function beforeFilter(){
		$this->Auth->allow('login');
		$this->set('logged_in',$this->Auth->loggedIn());
		$this->set('curr_user',$this->Auth->user());
	}

	public $_jsVars = array();

	 public function setJsVar($name, $value){
        $this->_jsVars[$name] = $value;
    }
    
	public function beforeRender(){
	 	$logged_in = $this->Auth->loggedIn();
	    if( ($logged_in) && ($this->action == 'login') ) {
	        $this->redirect(array('controller' => 'dashboards', 'action' => 'index'));	
        }
        // Set the jsVars array which holds the variables to be used in js
        $this->set('jsVars', $this->_jsVars);
        if($this->name == 'CakeError'){
        	$this->layout='admin';
        }
        parent::beforeRender();
    }

}
