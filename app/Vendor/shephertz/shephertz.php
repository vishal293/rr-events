<?php
include_once 'StorageService.php'; 
include_once 'ImageProcessorService.php'; 
include_once 'UploadService.php';
include_once 'UserService.php'; 
include_once 'App42Response.php';  
include_once 'App42Log.php';
include_once 'App42BadParameterException.php';
include_once 'App42NotFoundException.php';
include_once 'App42SecurityException.php';
include_once 'App42Exception.php';
include_once 'Util.php';
/**
 * This class basically is a factory class which builds the service for use.
 * All services can be instantiated using this class
 * 
 */
class ShephertzApp{ 
	
    /**
     * Test Method for creating the User in App42 Cloud. 
     */

    public $db = "QICEDB";

    public function __construct(){
          App42API::initialize
          ("364bdb81617f00608cfe04a26ac12d9362dbcd146dc885559143fdc125b1122f", 
    "a36f62ef9fa63fc3f6b4f033a73a0360fdf69251d5d3f77a30ff288070a09fc6");
    }


    public function getDocCount($collectionName,$selectKeys=""){
      $db = $this->db;
      $response = null;
      $storage = App42API::buildStorageService();
      $storage->setSelectKeys($selectKeys);  
      try{
         $responses = $storage->findAllDocuments($db,$collectionName);
         return $responses;
      } catch (App42Exception $ex) {
       
      }
    }

    
    public function getItems($collectionName){

      	$response = null;
        $storage = App42API::buildStorageService();

        try {
       
         $responses = $storage->findAllDocuments('QICEDB',$collectionName);
         return $responses;
       
        }  catch (App42Exception $ex) {
            // Exception Caught due to other Validation
        }
       
    }

    public function getBykeyVal($collectionName, $key, $value){
      $response = null;
      $storage = App42API::buildStorageService();

      try{
         $responses = $storage->findDocumentByKeyValue('QICEDB',$collectionName,$key, $value);
         return $responses;
      } catch (App42Exception $ex) {
            // Exception Caught due to other Validation
      }
    }

    public function getSingleItems($collectionName,$id){
      
      $response = null;
      $storage = App42API::buildStorageService();

      try{
         $responses = $storage->findDocumentById('QICEDB',$collectionName,$id);
         return $responses;
      } catch (App42Exception $ex) {
        
            // Exception Caught due to other Validation
      }
    }

    public function editItem($collectionName,$id,$doc){
      $response = null;
      $storage = App42API::buildStorageService();
      try{
         $responses = $storage->updateDocumentByDocId('QICEDB',$collectionName,$id,$doc);
         return $responses;
      } catch (App42Exception $ex) {


            // Exception Caught due to other Validation
      }
    }

    public function addItem($collectionName,$doc){     

      // pr($doc); exit;
      $response = null;
      $storage = App42API::buildStorageService();

      try{
         $responses = $storage->insertJSONDocument('QICEDB',$collectionName,$doc);
         return $responses;
      } catch (App42Exception $ex) {
            
            
            // Exception Caught due to other Validation
      }
    }

    public function deleteItem($collectionName,$id){

      $response = null;
      $storage = App42API::buildStorageService();

      try{
         $responses = $storage->deleteDocumentById('QICEDB',$collectionName,$id);
         return $responses;
      } catch (App42Exception $ex) {
            // Exception Caught due to other Validation
      }
    }

    public function upldFile($filename, $path, $type, $desc){
      $response = null;
      $upload = App42API::buildUploadService();

      try{
         $responses = $upload->uploadFile($filename, $path, $type, $desc);
         return $responses;
      } catch (App42Exception $ex) {
        // pr($ex);
        // exit;
            // Exception Caught due to other Validation
      }
    }

    public function saveThumb($name, $imagePath, $width, $height){
      $response = null;
      $upload = App42API::buildImageProcessorService();   

      try{
         $responses = $upload->thumbnail($name, $imagePath, $width, $height);
         return $responses;
      } catch (App42Exception $ex) {
        pr($ex);
        exit;
            // Exception Caught due to other Validation
      }
    }

    public function utilme($date)
    {
      $util = new Util("364bdb81617f00608cfe04a26ac12d9362dbcd146dc885559143fdc125b1122f", 
    "a36f62ef9fa63fc3f6b4f033a73a0360fdf69251d5d3f77a30ff288070a09fc6");
     return $util->getUTCFormattedTimestamps($date);
    }

    public function reversetime($date)
    {
      $util = new Util("364bdb81617f00608cfe04a26ac12d9362dbcd146dc885559143fdc125b1122f", 
    "a36f62ef9fa63fc3f6b4f033a73a0360fdf69251d5d3f77a30ff288070a09fc6");
      return $util->reverseTimeFormat($date);
    }
    public function getUTCtime(){
      $util = new Util("364bdb81617f00608cfe04a26ac12d9362dbcd146dc885559143fdc125b1122f", 
    "a36f62ef9fa63fc3f6b4f033a73a0360fdf69251d5d3f77a30ff288070a09fc6");
      return $util->getUTCFormattedTimestamp();
    }
    public function checkCat($value){
      $response = null;
      $storage = App42API::buildStorageService();

      try{
         $responses = $storage->findDocumentByKeyValue('QICEDB','EventCollection','category_id',$value);
         return $responses;
      } catch (App42Exception $ex) {
      }
    }
  }
?>