<?php

class AdminController extends AppController {

	/*
	 *	Function Name		: index
	 *	Description			: Send to login action on index action.
	 *	Input Parameters	: null
	 *	Returns 			: Send to login page.
	 */
	public function index() {
		// $this->isLoggedIn();
		if($this->Session->read('Admin.username')!=""){
			$this->redirect(array('action' => 'dashboard'));
		}
		// $this->set('pageheader', 'Login');
		$this->redirect(array('action' => 'login'));
	}

	/*
	 *	Function Name		: login
	 *	Description			: Check the user credential for login
	 *	Input Parameters	: null
	 *	Returns 			: If success send to company list otherwise send to login page.
	 */
	public function login() {
		$sessionComponent = $this -> Components -> load('Session');
		$user_session_data = $sessionComponent -> read('logged_user_data');
		if($user_session_data!=""){
			$this->Session->setFlash(ALREADY_LOGIN,'alert-box', array('class'=>'alert-warning'));
			$this->redirect('dashboard');
		}else{
			$this->layout = "admin";
			if ($this->request->is('post')) {
				$username=$this->request['data']['Admin']['username'];
				$password=$this->request['data']['Admin']['password'];
				if($username==''){
					$this->Session->setFlash(EMPTY_USERNAME,'alert-box', array('class'=>'alert-danger'));
					$this->redirect(array('controller' => 'Admin','action' => 'login'));
				} elseif($password=='') {
					$this->Session->setFlash(EMPTY_PASSWORD,'alert-box', array('class'=>'alert-danger'));
					$this->redirect(array('controller' => 'Admin','action' => 'login'));
				}
				if($username!='' and $password!='' ){
					$userdata = $this->Admin->find('all',array(
						'conditions' => array(
							'Admin.username' => $username,
							'Admin.password' => $password
						)
					));
					if (count($userdata)>=1) {
						//set session variable
						$this->Session->write('logged_user_data', $userdata);
						$this->Session->write('Admin.username', $userdata[0]['Admin']['username']);
						$this->Session->write('Admin.user_id', $userdata[0]['Admin']['id']);
						$this->Session->write('Admin.email',$userdata[0]['Admin']['email']);
						$this->Session->setFlash(LOGIN_SUCCESS,'alert-box', array('class'=>'alert-success'));
						// $this->Session->setFlash(LOGIN_SUCCESS, 'success');
						$this->redirect('dashboard');
					} 
					else {
						$this->Session->setFlash(WRONG_USER_NAME_OR_PASSWORD,'alert-box', array('class'=>'alert-danger'));
						// $this->Session->setFlash(WRONG_USER_NAME_OR_PASSWORD,'error');
						$this->redirect(array('controller' => 'Admin','action' => 'login'));
					}
				}
			}
		}
	}

	/*
	 *	Function Name		: dashboard
	 *	Description			: Dashboard for Admin
	 *	Input Parameters	: Null
	 *	Returns 			: Null
	 */
	public function dashboard() {
		$this->isLoggedIn();
		// $this->layout ="admin";
	}
	 public function login1(){
		 $this->layout = "test";
	 }

}

?>
