<?php 
	App::import('Vendor','shephertz/shephertz');
	class DashboardsController extends AppController{
		public $layout='admin';

		public function index(){
			$this->set('title_for_layout', 'Citybuzz | Dashboard');
		}

		public function getAllAppUsers(){
			$collName = 'ProfileDataCollection';
			$shephertz = new ShephertzApp();
      		$selectKeys = array('Occupation');  
			$responses = $shephertz->getDocCount($collName,$selectKeys);
			$jsondoc = $responses->getJsonDocList();
			$i=0;
			$doc = array();
			foreach($jsondoc as $j){
				$doc[$i] = $j->getJsonDoc();
				$i++;
			}
			echo json_encode($doc);
			$this->layout=false;
			$this->render(false);
		}
		public function  getAllEvents(){
			$collName = 'EventCollection';
			$shephertz = new ShephertzApp();
      		$selectKeys = array('approved','end_date','plan');  
			$responses = $shephertz->getDocCount($collName,$selectKeys);
			$jsondoc = $responses->getJsonDocList();
			$i=0;
			$doc = array();
			foreach($jsondoc as $j){
				$doc[$i] = $j->getJsonDoc();
				$i++;
			}
			echo json_encode($doc);
			$this->layout=false;
			$this->render(false);
		}
		public function  getAllOffers(){
			$collName = 'OfferCollection';
			$shephertz = new ShephertzApp();
      		$selectKeys = array('approved','end_date','plan');  
			$responses = $shephertz->getDocCount($collName,$selectKeys);
			$jsondoc = $responses->getJsonDocList();
			$i=0;
			$doc = array();
			foreach($jsondoc as $j){
				$doc[$i] = $j->getJsonDoc();
				$i++;
			}
			echo json_encode($doc);
			$this->layout=false;
			$this->render(false);
		}

	}
?>
