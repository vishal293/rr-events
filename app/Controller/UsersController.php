<?php
	App::uses('CakeEmail', 'Network/Email');

	class UsersController extends AppController{

		public $layout='admin';

		public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('logout'); 
		}

		public function isAuthorized($user){
			$av_actions=array('add','edit','delete',);

			if(in_array($this->action, $av_actions)){
				if($user['role'] != 'admin'){
					return false;
				}				
			}
			
			return true;
		}

		public function email(){
			if($this->request->is('post')){
				$recpt = $this->User->find('list', array(
										'conditions'=>array(
											'User.role'=>'admin'
										),
										'fields'=>array('User.email')
									)
				);
				$link = $this->data['ret']; 
				$ename = $this->data['ename'];
				foreach ($recpt as $key => $value) {
					$email = new CakeEmail();
					$email->config('mandrill');
					$email->viewVars(array('link'=>$link));
					$email->emailFormat('html');
					$email->template('new');
					$email->subject('Approve - '.$ename);
					$email->to($value);
					$result = $email->send();
				}	
			}else{
				$this->redirect(array('controller'=>'dashboard','action'=>'index'));
			}

			$this->layout = false;
			$this->render(false);
		}
		public function login() {
			$this->layout='login';
			if($this->request->is('post')) {
				if($this->Auth->login()) {
					if($this->Auth->user('role') == 'manager'){

					}
					return $this->redirect($this->Auth->redirectUrl());
				} else{
					$this->Session->setFlash('<center style="margin-top:6px; margin-bottom:-18px"><p class="text-danger">Incorrect Email or Password</p></center>');
				}
			}
			$this->set('title_for_layout', 'Citybuzz | Login to CityBuzz');					
		}

		public function logout() {
			$this->redirect($this->Auth->logout());
		}
		public function index(){
			$u = $this->User->find('all',array(
									'order'=>array('FIELD(User.role, "admin", "manager","basic_user") ASC')
										)
			);
			$this->set('title_for_layout', 'Citybuzz | Users');					
			$this->set('users',$u);
		}

		public function add(){
			//$this->layout='admin';
			$this->Session->setFlash('');
			if($this->request->is('post')){
				if($this->User->save($this->request->data)){
										
					$this->Session->setFlash('User added successfully');
					$this->redirect(array('controller'=>'users','action'=>'index'));
				}
				else{
					$this->Session->setFlash('The user already exists. Try adding another user');
					//$this->redirect(array('controller'=>'users','action'=>'index'));
				}
			}
			$this->set('title_for_layout', 'Citybuzz | Add New User');					
		}

		public function view($id = ""){
			if(!$id){
				$this->Session->setFlash('Invalid User');
				$this->redirect(array('controller'=>'users','action'=>'index'));
			}

			$user = $this->User->findById($id);

			$this->set('title_for_layout', 'Citybuzz | '.$user['name']);					
			$this->set('u',$user);			
		}

		public function edit($id = ""){
			if(!$id){
				$this->Session->setFlash('Invalid User');
				$this->redirect(array('controller'=>'users','action'=>'index'));
			}

			if($this->request->is('post')){
				if($this->User->save($this->request->data)){
					$this->Session->setFlash('user updated');
					$this->redirect(array('controller'=>'users','action'=>'index'));
				}
				else{
					$this->Session->setFlash('unable to update');
				}
			}

			$this->request->data = $this->User->findById($id);	
								
		}

		public function delete($id = ""){
			if(!$id){
				$this->Session->setFlash('Invalid User');
				$this->redirect(array('controller'=>'users','action'=>'index'));
			}

			if($this->User->delete($id)){
				$this->Session->setFlash('User Successfully Deleted');
				$this->redirect(array('controller'=>'users','action' => 'index'));
			}
			else{
				$this->Session->setFlash('User cannot be Deleted');
				$this->redirect(array('controller'=>'users','action' => 'index'));

			}
		}
	} 
 ?>

