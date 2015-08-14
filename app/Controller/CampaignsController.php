<?php
App::uses('AppController', 'Controller');
error_reporting(0);
/**
 * Campaigns Controller
 *
 * @property Campaign $Campaign
 * @property PaginatorComponent $Paginator
 */
class CampaignsController extends AppController {
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');
        //public $components = array('RequestHandler');
	public $helpers = array('Js');

/**
 * index method
 *
 * @return void
 */
	public function index($status=null) {
		$this->isLoggedIn();
                $title="";
		$client_id="";
		$created_on="";
		$campstatus="";
		$CampaignType="live";
		$this->Campaign->recursive = 0;
                $conditions = array('status'=>1);
		 /* For Searching*/
		if(count($this->request->query)>0) {
			$title = $this->request->query['title'];
			$client_id = $this->request->query['client_id'];
			$created_on = $this->request->query['created'];
			$campstatus = $this->request->query['campStatus'];
			if(!empty($title)){
				$conditions["Campaign.title LIKE"] = '%'.$title.'%';
			}
			if(!empty($client_id)){
				$conditions["Campaign.client_id"] = $client_id;
			}
			if(!empty($created_on)){
				$conditions["DATE(Campaign.created)"] = $created_on;
			}
			if(!empty($campstatus)){
				if($campstatus==3){
					$conditions['status'] = 0;
				}else {
					$conditions['status'] = $campstatus;
				}
			}
		}       
        /* For Getting Campaigns According to Status(Live, Paused Or UnderReveiw) */
		if($status){
			if($status==1){
				$conditions['status'] = 1;
				$CampaignType="live";
			}else if($status==2){
				$conditions['status'] = 2;
				$CampaignType="paused";
			}else{
				$conditions['status'] = 0;
				$CampaignType="inactive";
			}
		}
                
		$this->paginate = array(
			'conditions'=>$conditions,
			'limit' => CAMPAIGN_LIMIT,
			'order' => array('created' => 'desc')
		);
		$this->set(array(
		'campaigns'=>$this->Paginator->paginate(),
		'CampaignType'=>$CampaignType
		));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->isLoggedIn();
		if (!$this->Campaign->exists($id)) {
			throw new NotFoundException(__('Invalid campaign'));
		}
		$options = array('conditions' => array('Campaign.' . $this->Campaign->primaryKey => $id));
		$this->set('campaign', $this->Campaign->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->isLoggedIn();
		if ($this->request->is('post')) {
			$this->Campaign->create();
			$this->Campaign->set($this->request->data);
			if ($this->Campaign->validates()) {
				$upload_file = $this->request->data["Campaign"]["app_logo"];
				$file_name = time().'_'.$upload_file["name"];
				$upload_path = UPLOAD_PATH.$file_name;
				if($this->fileUpload($upload_file,$upload_path)){
					$this->request->data['Campaign']['app_logo_name'] = $file_name;
					if ($this->Campaign->save($this->request->data)) {
						$this->Session->setFlash(CAMPAIGN_SAVED,'success');
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(CAMPAIGN_NOT_SAVED,'alert-box', array('class'=>'alert-success'));
					}
				}else {
					$this->Session->setFlash(LOGO_NOT_UPLOADED,'alert-box', array('class'=>'alert-danger'));
				}
			}
		}
		$clients = $this->Campaign->Client->find('list');
		// debug($clients);
		$this->set(compact('clients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->isLoggedIn();
		if (!$this->Campaign->exists($id)) {
			throw new NotFoundException(__('Invalid campaign'));
		}
		$options = array('conditions' => array('Campaign.' . $this->Campaign->primaryKey => $id));
		$old_data = $this->Campaign->find('first', $options);
		if($this->request->is('post') || $this->request->is('put')) {
			$upload_file = $this->request->data["Campaign"]["app_logo"];
			if(empty($upload_file["name"])) {
				$this->request->data['Campaign']['app_logo_name'] = $old_data['Campaign']['app_logo_name'];
			}else{
				$file_name = time().'_'.$upload_file["name"];
				$upload_path = UPLOAD_PATH. DS .$file_name;
				$this->request->data['Campaign']['app_logo_name'] = $file_name;
			}
			if($this->Campaign->save($this->request->data)) {
                                $file_name = time().'_'.$upload_file["name"];
				$upload_path = UPLOAD_PATH. DS .$file_name;
				$this->Session->setFlash(CAMPAIGN_UPDATED,'alert-box', array('class'=>'alert-success'));
				$this->fileUpload($upload_file,$upload_path);
				$this->redirect(array('action' => 'view',$id));
			}else{
				$this->Session->setFlash(CAMPAIGN_NOT_UPDATED,'alert-box', array('class'=>'alert-danger'));
			}
		}else{
			$this->request->data = $old_data;
		}
		$clients = $this->Campaign->Client->find('list');
		$this->set(compact('clients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->isLoggedIn();
		$this->Campaign->id = $id;
		if (!$this->Campaign->exists()) {
			throw new NotFoundException(__('Invalid campaign'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Campaign->delete()) {
			$this->Session->setFlash(__('The campaign has been deleted.'));
		} else {
			$this->Session->setFlash(__('The campaign could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
/*
	 *	Function Name		: showCampaings
	 *	Description			: Used to Pause and Resume Campaigns
	 *	Input Parameters	: id, status, current_page
	 *	Returns 			: void
	*/
	public function playPause($id=null,$status=null, $current_page=null){
		
		//debug($id." ".$status." ".$current_page_url);
		if(count($_POST)>0){
			$CampaignType = $_POST['CampaignType'];
		}else {
			$CampaignType ="";
		}
		
		$page = "";
		if($current_page==null){
			$page = "page:1";
		}else if($current_page=="edit"){
			$page =	$current_page;
		}else {
			$page = "page:".$current_page;
		}
		if($CampaignType=="paused"){
			$url=2;
		}else if($CampaignType=="inactive"){
			$url=3;
		}
		if($id && $status){
			$this->request->onlyAllow('post', 'delete');
			if($this->Campaign->updateAll(array('status'=>$status),array('Campaign.id'=>$id))) {
				if($page=="edit"){
					// $this->Session->setFlash('Campaign Status Updated','alert-box', array('class'=>'alert-success'));
					$this->redirect(array('action'=>'edit',$id));
				}
				$this->redirect(array('action'=>'index',$url,$page));
			}else {
				
				$this->redirect(array('action'=>'index',$url,$page));
			}
		}
	} 
        
        /*
	 *	Function Name		: exportCampaigns
	 *	Description			: Used to Export the Campaigns to Excel Sheet
	 *	Input Parameters	: null
	 *	Returns 			: void
	*/
	public function exportCampaigns($status){
		$data = $this->Campaign->find('all',array(
					'conditions'=>array(
						'Campaign.status'=>$status
					),
					'order' => array(
						'created' => 'desc'
					)
				));
		$this->set('data',$data);
		$this->layout = 'ajax';
	}
	
}
