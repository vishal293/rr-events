<?php 

App::import('Vendor','shephertz/shephertz');
App::import('Controller','Users');	
App::uses('CakeEmail', 'Network/Email');

class CategoriesController extends AppController {
	public $layout='admin';

	public function isAuthorized($user){
			$av_actions=array('add','edit','delete','view','index');

			if(in_array($this->action, $av_actions)){
				if($user['role'] != 'admin'){
					return false;
				}				
			}			
			return true;
	}

	public $helpers = array('Html', 'Form', 'Session');

	public $components = array('Session');

	public $collectionName = 'CategoryCollection';


	public function ajax_upload_image(){
			$maxSize="1048576";
			$ret=array();
			$shephertz = new ShephertzApp();						
			$v = $this->data['inputfield'];	
			if($v == 'organizer_logo'){
				$maxSize = "50000";
			}		
			$photo = $this->data['photo'][$v];

			if( ($photo['error'] == '0') && ($photo['size'] <= $maxSize) )
			{
				$filetype = array('image/gif', 'image/jpeg', 
					'image/jpg', 'image/png');
				if(in_array($photo['type'], $filetype)) 
				{
					$uploadExtention = pathinfo($photo["name"], PATHINFO_EXTENSION);
					$name = pathinfo($photo['name'], PATHINFO_FILENAME);
					$imgName = date('dmYhis', time()).".".$uploadExtention;
					$tmp_name = $photo["tmp_name"];	        
			        $photo_upl=$shephertz->upldFile($imgName,$tmp_name,'IMAGE','uploaded image');
					$photo_path=$photo_upl->fileList[0]->url;
					$ret['_path'] = $photo_path;
			        echo json_encode($ret);			        
				}
			}
			else{
				$ret['_error'] = "error";				
				echo json_encode($ret);
			}
			$this->layout=false;
			$this->render(false);
		}

	public function imgupld($imgdata){
		$photo=array();
		foreach($imgdata as $k=>$v){
			if($v['tmp_name'] != ''){
				$uploadExtention = pathinfo($v["name"], PATHINFO_EXTENSION);
				$name = pathinfo($v['name'], PATHINFO_FILENAME);
				$imgName=$name."_category".".".$uploadExtention;
				//$photo[$k] = $this->_encodeImage($v['tmp_name']);
				$photo_upl[$k]=$shephertz->upldFile($imgName,$v['tmp_name'],'IMAGE','Category image');
				$ret = array();
				foreach($photo_upl as $filter){
					$ret=$filter->fileList;
					$photo[$k]=$ret[0]->url;
				}
				
			}
			else{
				$photo[$k] = "";
			}
			
		}
		return $photo;
	}


		/*public function ajax_add(){
			$collName = $this->collectionName;	
			$shephertz = new ShephertzApp();
			$jsonDoc = new JSONObject(); 
			date_default_timezone_set('Asia/Kolkata');			
			$data=$this->data;
				pr($data);
			// var_dump($_POST);
			// $category=array();
			// $category=$data['data'];
			// $category['user'] = $this->Auth->user('id');
			// $category['updated_on'] = date('d-m-Y h:i:s A', time());				
									

			// var_dump($category);
						

			// // $newdata = array_merge($category, $category);

			// foreach($newdata as $k=>$v){
			// 	$newjson = $jsonDoc->put($k,$v);
			// }
			// 	$newdoc = $shephertz->addItem($collName,$newjson);					
			// 	$newid = $newdoc->jsonDocList[0]->docId;					
			// if($newdoc){
			// 	echo json_encode('_succ');
			// 	//$this->email($newid,$event['offer']);
			// }
			// else{
			//  	echo json_encode("_err");
			// }

			$this->layout=false;
			$this->render(false);
		}*/


	public function index($cname=""){
		if($cname == ""){
			$collName = $this->collectionName;
		}
		else{
			$collName = $cname;
		}
		$shephertz = new ShephertzApp();
		$responses = $shephertz->getItems($collName);
			
		//We get a lot of data here - Filtering them helps
		$filtered_response = $responses->jsonDocList;

		$category = array();
		$i = 0;
		foreach($filtered_response as $single_response)
		{
			//Getting the responses and filtering it
			$json_object = $single_response->jsonDoc;
			$category[$i]['category_id'] = $single_response->docId;
			$category[$i]['category_name'] = $json_object->category_name;
			$i++;
		}
		
		//Test
		if($cname == ""){
			$this->set('category',$category);
			$this->set('title_for_layout', 'Citybuzz | Categories');
			$this->setJsVar('myvariable',$category);

		}
		else{
			return $category;
		}		

	}

	/*public function add(){
		$collName = $this->collectionName;	
		$shephertz = new ShephertzApp();
		if($this->request->is('post')){
				$data = $this->data;
				$catdata = $data['data'];

				$jsonDoc = new JSONObject(); 
				// $imgdata = $data['photo'];
				// $photo = $this->imgupld($imgdata);
				// $newdata = array_merge($catdata,$photo);
				foreach($catdata as $k=>$v){

					$newjson = $jsonDoc->put($k, $v);
				}

				
				if($shephertz->addItem($collName,$newjson)){
					$this->Session->setFlash('Category Sucessfully Added');
					$this->redirect(array('controller'=>'categories','action' => 'index'));

				}
				else{
				 	$this->Session->setFlash('Cannot Add Category');
				}				
		}
	}*/

	public function ajax_add(){
		$collName = $this->collectionName;	
		$shephertz = new ShephertzApp();
		$data = $this->data;
		$catdata = $data['data'];
		$jsonDoc = new JSONObject();
		foreach($catdata as $k=>$v){
			$newjson = $jsonDoc->put($k, $v);
		}
		if($shephertz->addItem($collName,$newjson)){
		 	echo json_encode("_succ");
		}
		else{
		 	echo json_encode("_err");
		}	
		$this->layout=false;
		$this->render(false);

	}

	public function edit($id=""){
		$collName = $this->collectionName;	
		$shephertz = new ShephertzApp();
		if($this->request->is('post')){
			//var_dump($this->data);
				$jsonDoc = new JSONObject(); 
				$docid = $this->data['id'];
				$data = $this->data;
				$catdata = $data['data'];
				$jsonDoc = new JSONObject(); 
				foreach($catdata as $k=>$v){

					$newjson = $jsonDoc->put($k, $v);
				}			
				
				if($shephertz->editItem($collName,$docid,$newjson)){
					$this->Session->setFlash('Category Sucessfully Updated');
					$this->redirect(array('controller'=>'categories','action' => 'index'));

				}
				else{
				 	$this->Session->setFlash('Cannot Update');
				}				
		}
		else {
				$responses = $shephertz->getSingleItems($collName,$id);
				$filtered_response = $responses->jsonDocList;
				//pr($filtered_response);
				$category = array();

				foreach($filtered_response as $single_response)
				{
					//Getting the responses and filtering it
					$json_object = $single_response->jsonDoc;
					$category['category_id'] = $single_response->docId;
					$category['category_name'] = $json_object->category_name;
					$category['category_img'] = $json_object->category_img;					
				}
				$this->set('category',$category);
				$this->set('title_for_layout', 'Citybuzz | Edit Category');

		}
		//Test	
		
	}	

	public function delete($id=""){
		$collName = $this->collectionName;	
		$shephertz = new ShephertzApp();
		$ret = $shephertz->checkCat($id);
		if(!$ret){
			if($shephertz->deleteItem($collName,$id)){
				$this->Session->setFlash("<div class='alert alert-success alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
	            Category Sucessfully Deleted
            </div>");
				$this->redirect(array('controller'=>'categories','action' => 'index'));

			}
			else{
			 	$this->Session->setFlash("<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
	            Cannot Delete Category
            </div>");
			}
		}
		else{
			
			$this->Session->setFlash("<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
	            Cannot delete category as there are events under it.
            </div>");			
			$this->redirect(array('controller'=>'categories','action' => 'index'));

		}

	}
}
?>