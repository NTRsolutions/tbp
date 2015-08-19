<?php
App::uses('AppController', 'Controller');
/**
 * Clients Controller
 *
 * @property Client $Client
 * @property PaginatorComponent $Paginator
 */
class ClientsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/*
	 *	Function Name		: index
	 *	Description		: Send to login action on index action.
	 *	Input Parameters	: null
	 *	Returns 		: Send to login page.
	 */
	public function index() { 
		// $this->isLoggedIn();
		if($this->Session->read('Client.username')!=""){
			$this->redirect(array('action' => 'home'));
		}
		// $this->set('pageheader', 'Login');
		$this->redirect(array('action' => 'login'));
	}
        
        /*
	 *	Function Name		: login
	 *	Description		: Check the client credential for login
	 *	Input Parameters	: null
	 *	Returns 		: If success send to home page otherwise send to login page.
	 */
	public function login() {
		$sessionComponents = $this -> Components -> load('Session');
		$client_session_data = $sessionComponents -> read('logged_client_data');
		if($client_session_data!=""){
			$this->Session->setFlash(ALREADY_LOGIN,'alert-box', array('class'=>'alert-warning'));
			$this->redirect('home');
		}else{
			$this->layout = "client";
			if ($this->request->is('post')) {
				$username=$this->request['data']['Client']['username'];
				$password=$this->request['data']['Client']['password'];
				if($username==''){
					$this->Session->setFlash(EMPTY_USERNAME,'alert-box', array('class'=>'alert-danger'));
					$this->redirect(array('controller' => 'Clients','action' => 'login'));
				} elseif($password=='') {
					$this->Session->setFlash(EMPTY_PASSWORD,'alert-box', array('class'=>'alert-danger'));
					$this->redirect(array('controller' => 'Clients','action' => 'login'));
				}
				if($username!='' and $password!='' ){
					$userdata = $this->Client->find('all',array(
						'conditions' => array(
							'Client.username' => $username,
							'Client.password' => $password
						)
					));
					if (count($userdata)>=1) {
						//set session variable
						$this->Session->write('logged_client_data', $userdata);
						$this->Session->write('Client.username', $userdata[0]['Client']['username']);
						$this->Session->write('Client.id', $userdata[0]['Client']['id']);
						$this->Session->write('Client.email',$userdata[0]['Client']['email']);
						$this->Session->setFlash('Welcome '.$userdata[0]['Client']['username'] ,'alert-box', array('class'=>'alert-success'));
						// $this->Session->setFlash(LOGIN_SUCCESS, 'success');
						$this->redirect('home');
					} 
					else {
						$this->Session->setFlash(WRONG_USER_NAME_OR_PASSWORD,'alert-box', array('class'=>'alert-danger'));
						// $this->Session->setFlash(WRONG_USER_NAME_OR_PASSWORD,'error');
						$this->redirect(array('controller' => 'Clients','action' => 'login'));
					}
				}
			}
		}
	}
        
         /*
	 *	Function Name		: home
	 *	Description		: Home page for Client
	 *	Input Parameters	: Null
	 *	Returns 		: Null
	 */
	public function home() {
		$this->isClientLoggedIn();
                $this->layout ="client";
	}
       
         /*
	 *	Function Name		: reports
	 *	Description		: get  client reports 
	 *	Input Parameters	: Null
	 *	Returns 		: Null
	 */
	public function reports() {
		$this->isClientLoggedIn();
                $this->layout ="client";
	}
        
        /*
         * Function Name      : changePassword
         * Description        : change client password
         * Input Parameters   : Null
         * Return             : Null
         */
        public function changePassword(){
            $this->isClientLoggedIn();
            $this->layout ="client";
            	if($this->request->is('post') || $this->request->is('put')) {
                    $sessionComponents = $this -> Components -> load('Session');
                    $client_session_data = $sessionComponents -> read('logged_client_data');
                    
                    $password = $this->request->data['client']['password'];
                    $new_password = $this->request->data['client']['new_password'];
                    $confirm_new_password = $this->request->data['client']['confirm_new_password'];
                    if($client_session_data){
                        if($this->Client->save($this->request->data)) {
                               $this->Session->setFlash(PASSWORD_CHANGED,'alert-box', array('class'=>'alert-danger'));        
			}
                        else{
				$this->Session->setFlash(TRY_AGAIN,'alert-box', array('class'=>'alert-danger'));
			}
                    }
                    else{
                        $this->Session->setFlash(TRY_AGAIN,'alert-box', array('class'=>'alert-danger'));
                    }
		}
                else{
			$this->Session->setFlash(TRY_AGAIN,'alert-box', array('class'=>'alert-danger'));
		}
	}
        

}
