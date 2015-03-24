<?php 
	App::import('Vendor','shephertz/shephertz');
	//App::import('Vendor','shephertz/Util');
	App::import('Controller','Categories');
	App::import('Controller','Users');	
	App::uses('CakeEmail', 'Network/Email');

	class EventsController extends AppController{

		public $layout='admin';

		public $helpers = array('Html', 'Form', 'Session');

		public $components = array('Session');

		public $collectionName = 'EventCollection';

		
		public function isAuthorized($user){
			$av_actions = array('add','edit','delete');
			$user_action = array('view','index','approved_offer','view_offer');
			$manager_action = array('add','ajax_add','view','index','approved_offer','view_offer','getCats','ajax_upload_image','email'); 
			if($user['role'] == 'basic_user'){
				if(!in_array($this->action, $user_action)){
					return false;
				}
			}

			if($user['role'] == 'manager'){
				if(!in_array($this->action, $manager_action)){
					return false;
				}
			}			
			return true;
		}

		public function _getView($id="",$collName){
			$category = new CategoriesController();
			$cat=$category->index('CategoryCollection');
			date_default_timezone_set('Asia/Kolkata');
			$this->set('cat',$cat);								
			//$collName = $this->collectionName;
			$shephertz = new ShephertzApp();			
			$responses = $shephertz->getSingleItems($collName,$id);
			$filtered_response = $responses->jsonDocList;
			$event = array();

			foreach($filtered_response as $single_response){
				//Getting the responses and filtering it
				$json_object = $single_response->jsonDoc;
				$event['event_id'] = $single_response->docId;
				$event['approved'] = $json_object->approved;
				$event['offer'] = $json_object->offer;
				$event['audience'] = $json_object->audience;								
				$event['user'] = $json_object->user;
				$event['plan'] = $json_object->plan;
				$event['amount'] = $json_object->amount;
				$event['notif'] = $json_object->notif;
				$event['notif_date'] = $json_object->notif_date;
				if($json_object->notif_time!=""){
					$event['notif_time'] =  date("g:i A", strtotime($json_object->notif_time));
				}
				$event['notif_msg'] = trim($json_object->notif_msg);
				$event['event_name'] = $json_object->event_name;
				$event['oneline_description'] = $json_object->oneline_description;
				$event['event_description'] = trim($json_object->event_description);
				$event['event_address'] = $json_object->event_address;
				$event['event_longitude'] = $json_object->event_longitude;
				$event['event_latitude'] = $json_object->event_latitude;
				$event['start_date'] = $json_object->start_date;
				$event['end_date'] = $json_object->end_date;

				$event['start_date'] = substr($event['start_date'],0,10);
				

				$date = new DateTime($event['start_date']);
				 $event['start_date'] = $date->format('d-m-Y');


				 $event['end_date'] = substr($event['end_date'],0,10);

				 $date = new DateTime($event['end_date']);
				$event['end_date'] = $date->format('d-m-Y');
				$event['start_time'] = date("g:i A", strtotime($json_object->start_time));
				$event['end_time'] = date("g:i A", strtotime($json_object->end_time));
				$event['event_photo'] = $json_object->event_photo;
				$event['photo_1'] = $json_object->photo_1;
				$event['photo_2'] = $json_object->photo_2;
				$event['photo_3'] = $json_object->photo_3;
				$event['photo_4'] = $json_object->photo_4;
				$event['photo_5'] = $json_object->photo_5;
				$event['photo_6'] = $json_object->photo_6;
				$event['photo_7'] = $json_object->photo_7;
				$event['photo_8'] = $json_object->photo_8;
				$event['photo_9'] = $json_object->photo_9;
				$event['photo_10'] = $json_object->photo_10;
				$event['organizer_name'] = $json_object->organizer_name;
				$event['organizer_contact'] = $json_object->organizer_contact;
				$event['organizer_website'] = $json_object->organizer_website;
				$event['organizer_logo'] = $json_object->organizer_logo;				
				$event['organizer_about'] = $json_object->organizer_about;				
				$event['category_id'] = $json_object->category_id;
				$event['category_name_str'] = $this->getCatTostring($json_object->category_id);
				$event['venue'] = $json_object->venue;
			}
			return $event;
			
		}

		protected function getCatTostring($cat_id=""){
			if($cat_id!=NULL){				
				$shephertz = new ShephertzApp();
				$cat = array();
				$cat_name ="";
				$c = 0;
				foreach($cat_id as $k=>$v){
					$responses[$k] = $shephertz->getSingleItems('CategoryCollection',$v);
					if($responses[$k]!=NULL){
						$filtered_response = $responses[$k]->jsonDocList;
						foreach($filtered_response as $key){
								//pr($key);
							$json_object = $key->jsonDoc;
							$cat['category_name'] = $json_object->category_name;
						}
						if($cat!=""){
							if($c != 0) {
									$cat_name .= ",";
							}

							$cat_name .=$cat['category_name']; 
							$c++;
						}	
					}
				}
				return $cat_name;
			}			
						
		}

		/*===================================
		=            Pages Index            =
		===================================*/
		/*==========  Event  ==========*/
		
		public function index(){
			$collName = $this->collectionName;	
			$shephertz = new ShephertzApp();
			$key = "approved";
			$value = "1";
			$responses = $shephertz->getBykeyVal($collName,$key,$value);
			//We get a lot of data here - Filtering them helps
			$filtered_response = $responses->jsonDocList;
			$event = array();
			$i = 0;
			foreach($filtered_response as $single_response)
			{
				//Getting the responses and filtering it
				$json_object = $single_response->jsonDoc;
				$event[$i]['event_id'] = $single_response->docId;
				$event[$i]['event_name'] = $json_object->event_name;
				$event[$i]['event_address'] = $json_object->event_address;
				$event[$i]['start_date'] = substr($json_object->start_date,0,10);
				$date = new DateTime($event[$i]['start_date']);
				$event[$i]['start_date'] = $date->format('d-m-Y');
				$event[$i]['end_date'] = substr($json_object->end_date,0,10);
				$date = new DateTime($event[$i]['end_date']);
				$event[$i]['end_date'] = $date->format('d-m-Y');
				$event[$i]['organizer_name'] = $json_object->organizer_name;
				$event[$i]['category_name'] = $this->getCatTostring($json_object->category_id);
				$i++;
			}
				$this->set('title_for_layout', 'Citybuzz | Approved Events');					
				$this->set('event',$event);	
		}

		public function archived_event(){
			$collName = $this->collectionName;	
			$shephertz = new ShephertzApp();
			$key = "approved";
			$value = "1";
			$responses = $shephertz->getBykeyVal($collName,$key,$value);
			//We get a lot of data here - Filtering them helps
			$filtered_response = $responses->jsonDocList;
			$event = array();
			$i = 0;
			foreach($filtered_response as $single_response)
			{
				//Getting the responses and filtering it
				$json_object = $single_response->jsonDoc;
				$event[$i]['event_id'] = $single_response->docId;
				$event[$i]['event_name'] = $json_object->event_name;
				$event[$i]['event_address'] = $json_object->event_address;
				$event[$i]['start_date'] = substr($json_object->start_date,0,10);
				$date = new DateTime($event[$i]['start_date']);
				$event[$i]['start_date'] = $date->format('d-m-Y');
				$event[$i]['end_date'] = substr($json_object->end_date,0,10);
				$date = new DateTime($event[$i]['end_date']);
				$event[$i]['end_date'] = $date->format('d-m-Y');
				$event[$i]['organizer_name'] = $json_object->organizer_name;
				$event[$i]['category_name'] = $this->getCatTostring($json_object->category_id);
				$i++;
			}
				$this->set('title_for_layout', 'Citybuzz | Approved Events');					
				$this->set('event',$event);	
		}
		
		
		public function unapproved(){
			$collName = $this->collectionName;	
			$shephertz = new ShephertzApp();
			$key = "approved";
			$value = "0";
			$responses = $shephertz->getBykeyVal($collName,$key,$value);
			$event = array();
			if($responses!=""){
					//We get a lot of data here - Filtering them helps
				$filtered_response = $responses->jsonDocList;
				$i = 0;
				foreach($filtered_response as $single_response)
				{
					//Getting the responses and filtering it
					$json_object = $single_response->jsonDoc;
					$event[$i]['event_id'] = $single_response->docId;
					$event[$i]['event_name'] = $json_object->event_name;
					$event[$i]['event_address'] = $json_object->event_address;
					$event[$i]['start_date'] = substr($json_object->start_date,0,10);
					$date = new DateTime($event[$i]['start_date']);
					$event[$i]['start_date'] = $date->format('d-m-Y');
					$event[$i]['end_date'] = substr($json_object->end_date,0,10);
					$date = new DateTime($event[$i]['end_date']);
					$event[$i]['end_date'] = $date->format('d-m-Y');
					$event[$i]['organizer_name'] = $json_object->organizer_name;
					$event[$i]['category_name'] = $this->getCatTostring($json_object->category_id);
					$i++;
				}

			}	
				$this->set('title_for_layout', 'Citybuzz | Unapproved Events');					
				$this->set('event',$event);
		}

		/*==========  Offer  ==========*/
		
		public function approved_offer(){
			$collName = "OfferCollection";
			$shephertz = new ShephertzApp();
			$key = "approved";
			$value = "1";
			$responses = $shephertz->getBykeyVal($collName,$key,$value);
			//We get a lot of data here - Filtering them helps
			$filtered_response = $responses->jsonDocList;
			$event = array();
			$i = 0;
			foreach($filtered_response as $single_response)
			{
				//Getting the responses and filtering it
				$json_object = $single_response->jsonDoc;
				$event[$i]['event_id'] = $single_response->docId;
				$event[$i]['event_name'] = $json_object->event_name;
				$event[$i]['event_address'] = $json_object->event_address;
				$event[$i]['start_date'] = substr($json_object->start_date,0,10);
				$date = new DateTime($event[$i]['start_date']);
				$event[$i]['start_date'] = $date->format('d-m-Y');
				$event[$i]['end_date'] = substr($json_object->end_date,0,10);
				$date = new DateTime($event[$i]['end_date']);
				$event[$i]['end_date'] = $date->format('d-m-Y');
				$event[$i]['organizer_name'] = $json_object->organizer_name;
				$event[$i]['category_name'] = $this->getCatTostring($json_object->category_id);
				$i++;
			}
				$this->set('title_for_layout', 'Citybuzz | Approved Offers');
				$this->set('event',$event);	
		}

			public function archived_offer(){
			$collName = "OfferCollection";
			$shephertz = new ShephertzApp();
			$key = "approved";
			$value = "1";
			$responses = $shephertz->getBykeyVal($collName,$key,$value);
			//We get a lot of data here - Filtering them helps
			$filtered_response = $responses->jsonDocList;
			$event = array();
			$i = 0;
			foreach($filtered_response as $single_response)
			{
				//Getting the responses and filtering it
				$json_object = $single_response->jsonDoc;
				$event[$i]['event_id'] = $single_response->docId;
				$event[$i]['event_name'] = $json_object->event_name;
				$event[$i]['event_address'] = $json_object->event_address;
				$event[$i]['start_date'] = substr($json_object->start_date,0,10);
				$date = new DateTime($event[$i]['start_date']);
				$event[$i]['start_date'] = $date->format('d-m-Y');
				$event[$i]['end_date'] = substr($json_object->end_date,0,10);
				$date = new DateTime($event[$i]['end_date']);
				$event[$i]['end_date'] = $date->format('d-m-Y');
				$event[$i]['organizer_name'] = $json_object->organizer_name;
				$event[$i]['category_name'] = $this->getCatTostring($json_object->category_id);
				$i++;
			}
				$this->set('title_for_layout', 'Citybuzz | Approved Offers');
				$this->set('event',$event);	
		}

		public function unapproved_offer(){
			$collName = "OfferCollection";	
			$shephertz = new ShephertzApp();
			$key = "approved";
			$value = "0";
			$responses = $shephertz->getBykeyVal($collName,$key,$value);
			
			//We get a lot of data here - Filtering them helps
			$event = array();
			if($responses!=""){
				$filtered_response = $responses->jsonDocList;
				$i = 0;
				foreach($filtered_response as $single_response)
				{
					//Getting the responses and filtering it
					$json_object = $single_response->jsonDoc;
					$event[$i]['event_id'] = $single_response->docId;
					$event[$i]['event_name'] = $json_object->event_name;
					$event[$i]['event_address'] = $json_object->event_address;
					$event[$i]['start_date'] = substr($json_object->start_date,0,10);
					$date = new DateTime($event[$i]['start_date']);
					$event[$i]['start_date'] = $date->format('d-m-Y');
					$event[$i]['end_date'] = substr($json_object->end_date,0,10);
					$date = new DateTime($event[$i]['end_date']);
					$event[$i]['end_date'] = $date->format('d-m-Y');
					$event[$i]['organizer_name'] = $json_object->organizer_name;
					$event[$i]['category_name'] = $this->getCatTostring($json_object->category_id);
					$i++;
				}
			}
				$this->set('title_for_layout', 'Citybuzz | Unapproved Offers');
				$this->set('event',$event);
		}
		/*-----  End of Pages Index   ------*/

		/*==========  Add-action  ==========*/
			
		public function add(){
			$collName = $this->collectionName;	
			$shephertz = new ShephertzApp();
			date_default_timezone_set('Asia/Kolkata');
			$this->set('title_for_layout', 'Citybuzz | Add Event');
		}

		/*==========  View  ==========*/

		public function view($id=""){
			$collName = $this->collectionName;
			$shephertz = new ShephertzApp();
			$event = $this->_getView($id,$collName);
			$this->set('event',$event);
			$this->set('title_for_layout', 'Citybuzz | '.$event['event_name']);

		}	

		public function view_offer($id=""){
			$collName = "OfferCollection";
			$shephertz = new ShephertzApp();
			$event = $this->_getView($id,$collName);
			$this->set('event',$event);
			$this->set('title_for_layout', 'Citybuzz | '.$event['event_name']);

		}

		/*==========  Edit  ==========*/
		
		public function edit($id=""){
         $this->set('uid', $id);
			if(!$id){
				$this->Session->setFlash('Invalid Event');
				$this->redirect(array('controller'=>'dashboards','action'=>'index'));
			}
			$collName = $this->collectionName;
			$shephertz = new ShephertzApp();
			$event = $this->_getView($id,$collName);
			// pr($event);
			$this->set('event',$event);
			$this->set('title_for_layout', 'Citybuzz | Edit Event');
		}

		public function edit_offer($id=""){
			if(!$id){
				$this->Session->setFlash('Invalid Event');
				$this->redirect(array('controller'=>'dashboards','action'=>'index'));
			}
			$collName = 'OfferCollection';
			$shephertz = new ShephertzApp();
         	$this->set('uid', $id);
			$event = $this->_getView($id,$collName);				
			$this->set('event',$event);
			$this->set('title_for_layout', 'Citybuzz | Edit Offer');
		}

		/*==========  Delete  ==========*/

		public function delete($id=""){
			$collName = $this->collectionName;	
			$shephertz = new ShephertzApp();
			if($shephertz->deleteItem($collName,$id)){
				$this->Session->setFlash('Event Sucessfully Deleted');
				$this->redirect(array('controller'=>'events','action' => 'index'));
			}
			else{
			 	$this->Session->setFlash('Cannot Delete Event');
			}
		}																			

		/*==========  Ajax  ==========*/

		public function approve(){

			$collName = $this->collectionName;
			$shephertz = new ShephertzApp();
			$jsonDoc = new JSONObject();
			$docid = $this->data['data']['id'];
			$data=$this->data['data'];
			date_default_timezone_set('UTC');
			$data['updated_on'] = $shephertz->getUTCtime();
			$data['start_time'] = date("H:i", strtotime($data['start_time']));
			$data['end_time'] = date("H:i", strtotime($data['end_time']));
			$data['notif_time'] = date("H:i", strtotime($data['notif_time']));
			

			$data['start_date'] = $shephertz->utilme($data['start_date']);
            // pr($event['start_date']);

			if(!$data['end_date']){
				$data['end_date']= $data['start_date'];
			}else
			{
				$data['end_date'] = $shephertz->utilme($data['end_date']);
			}
			foreach($data as $k=>$v){
				$newjson = $jsonDoc->put($k,$v);
			}
			if($data['offer'] == 'Offer'){
				$collName = 'OfferCollection';
			}

			if($shephertz->editItem($collName,$docid,$newjson)){
			 	if($data['offer'] == 'Offer'){
			 		echo json_encode('view_offer/'.$docid);
			 	}
			 	else{
		 			echo json_encode('view/'.$docid);
			 	}
			}
			else{
			 	echo json_encode("_err");
			}
			$this->layout=false;
			$this->render(false);
		}

		public function ajax_add(){
			$collName = $this->collectionName;	
			$shephertz = new ShephertzApp();
			$jsonDoc = new JSONObject(); 
			date_default_timezone_set('UTC');	
			$data=$this->data;
			$event=array();
			$event=$data['data'];
			$event['approved'] = '0';
			$event['user'] = $this->Auth->user('id');
			$event['updated_on'] = $shephertz->getUTCtime();
            
			$event['start_time'] = date("H:i", strtotime($event['start_time']));
			
			$event['end_time'] = date("H:i", strtotime($event['end_time']));
			if($event['notif_time']){
				$event['notif_time'] = date("H:i", strtotime($event['notif_time']));
			}
            $event['start_date'] = $shephertz->utilme($event['start_date']);
			if(!$event['end_date']){
				$event['end_date']= $event['start_date'];
			}else
			{
				$event['end_date'] = $shephertz->utilme($event['end_date']);
			}


			$category=$data['cat'];
			/*if($category==NULL){
				echo json_encode('cat_error');
				exit;
			}*/				

			if($event['offer'] == 'Offer'){
				$collName = 'OfferCollection';
			}				

			$newdata = array_merge($event, $category);
			
			foreach($newdata as $k=>$v){
				$newjson = $jsonDoc->put($k,$v);
			}
				$newdoc = $shephertz->addItem($collName,$newjson);					
				$newid = $newdoc->jsonDocList[0]->docId;					
			if($newdoc){
				$resp = array();
				if($event['offer'] == 'Offer'){
					$resp['ename'] = $event['event_name'];
					$resp['path'] = 'view_offer/'.$newid;
					echo json_encode($resp);
				}
				else{
					$resp['ename'] = $event['event_name'];
					$resp['path'] = 'view/'.$newid;
					echo json_encode($resp);
				}
			}
			else{
			 	echo json_encode("_err");
			}

			$this->layout=false;
			$this->render(false);
		}

		public function ajax_edit(){
			$collName = $this->collectionName;
			$shephertz = new ShephertzApp();
			$jsonDoc = new JSONObject();
			date_default_timezone_set('UTC');
			$data=$this->data;
			$docid = $data['id'];
			$event=array();
			$event=$data['data'];
			$event['updated_on'] = $shephertz->getUTCtime();
			$event['start_time'] = date("H:i", strtotime($event['start_time']));
			$event['end_time'] = date("H:i", strtotime($event['end_time']));
			if($event['notif_time']){
				$event['notif_time'] = date("H:i", strtotime($event['notif_time']));
			}
			$event['start_date'] = $shephertz->utilme($event['start_date']);
			if(!$event['end_date']){
				$event['end_date']= $event['start_date'];
			}else
			{
				$event['end_date'] = $shephertz->utilme($event['end_date']);
			}

									
			$category=$data['cat'];	

			$newdata = array_merge($event,$category);
				
				// pr($newdata);		
			foreach($newdata as $k=>$v){
				$newjson = $jsonDoc->put($k,$v);
			}

			if($event['offer'] == 'Offer'){
				$collName = 'OfferCollection';
			}
					
			if($shephertz->editItem($collName,$docid,$newjson)){
			 	if($event['offer'] == 'Offer'){
					echo json_encode('view_offer/'.$docid);
				}
				else{
					echo json_encode('view/'.$docid);
				}
			}
			else{
			 	echo json_encode("_err");
			}

			$this->layout=false;
			$this->render(false);
		}
		
		public function ajax_upload_image(){
			$maxSize="2097152";
			$ret=array();
			$shephertz = new ShephertzApp();						
			$v = $this->data['inputfield'];	
			$photo = $this->data['photo'][$v];
			if($photo['error'] == '0'){
				if($photo['size'] <= $maxSize){
					$filetype = array('image/gif', 'image/jpeg', 'image/jpg', 'image/png');
					if(in_array($photo['type'], $filetype)) {
						$uploadExtention = pathinfo($photo["name"], PATHINFO_EXTENSION);
						$name = pathinfo($photo['name'], PATHINFO_FILENAME);
						$imgName = date('dmYHis', time()).".".$uploadExtention;
						$tmp_name = $photo["tmp_name"];	
				        $photo_upl=$shephertz->upldFile($imgName,$tmp_name,'IMAGE','uploaded image');
				        $photo_path=$photo_upl->fileList[0]->url;
						$ret['_path'] = $photo_path;
				        echo json_encode($ret);			        
					}	
				}
				
			}
			else{
				$ret['_error'] = "error";				
				echo json_encode($ret);
			}
			$this->layout=false;
			$this->render(false);
		}
		
		public function getCats(){
			$category = new CategoriesController();
			$cat=$category->index('CategoryCollection');
			echo json_encode($cat);
			$this->layout=false;
			$this->render(false);
		}
	}
?>