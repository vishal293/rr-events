<?php
	App::uses('BlowfishPasswordHasher','Controller/Component/Auth');

	class User extends AppModel{

		public $validate = array(
			'email' => array(
				'is_not_empty' => array(
					'rule' => array('notEmpty'),
					'message' => 'email id cannot be empty'
				),
				'is_unique_email' => array(
					'rule' => array('isUnique'),
					'message' => 'email id already exists'
				)
			),

			'password' => array(
				'not_empty' => array(
					'rule' => array('notEmpty'),
					'message' => 'Password cannot be empty'
				),
				'min_length' => array(
					'rule' => array('minLength','8'),
					'message' => 'Password must be atleast 8 characters'
				)
			),		
		
			'cnf_password' => array(
				'is_match' => array(
					'rule' => array('matchPass'),
					'message' => 'Password should be similar to each other'
				)
			)
		);		
	

		public function matchPass($opt = array()){
			if(isset($this->data['User']['cnf_password'])):
				if($this->data['User']['cnf_password'] === $this->data['User']['password']):
					return true;
				endif;
				return false;
			endif;
			return true;
		}

		public function beforeSave($opt = array()){
			if(isset($this->data['User']['password'])):
				$pw= new BlowfishPasswordHasher();
				$this->data['User']['password'] = $pw->hash(
					$this->data['User']['password']
				);
				return true;
			endif;
			return true;
		}			
	}
?>