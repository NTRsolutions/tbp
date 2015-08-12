<?php
App::uses('AppController', 'Controller');
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
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->isLoggedIn();
		$this->Campaign->recursive = 0;
		$this->set('campaigns', $this->Paginator->paginate());
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
			if ($this->Campaign->save($this->request->data)) {
				$this->Session->setFlash(__('The campaign has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The campaign could not be saved. Please, try again.'));
			}
		}
		$clients = $this->Campaign->Client->find('list');
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
				$this->Session->setFlash(CAMPAIGN_UPDATED,'alert-box', array('class'=>'alert-success'));
				$this->fileUpload($upload_file,$upload_path);
				$this->redirect(array('action' => 'view',$id));
			}else{
				$this->Session->setFlash(__(CAMPAIGN_NOT_UPDATED,'alert-box', array('class'=>'alert-danger')));
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
}
