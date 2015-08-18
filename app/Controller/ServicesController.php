<?php
/*
This file gets initiated on each service request.
By Default Index gets called which starts with JSON request parsing.
*/

App::uses('AppController', 'Controller');
include('json/CJSON.php');
// include('xmpphp/XMPP.php');

class ServicesController extends AppController {
	public $name = 'Services';

	/*
	 * Function Name	: index
	 * Description		: By Default Index function is called which determines the which request to process
	 * 					  based on its request_type_sent data in json format.
	 * Parameters		: None
	 * Returns			: Response Jason data zipped.
	*/

	public function index() {
		// echo "hii";die;
		$this->layout = "";
		$data=$this->RestData();
		$this->autoRender = false;
		$myObj = CJSON::decode($data, $useArray=false);
		$requested_service=$myObj->{"request_type_sent"};
		$this->log("REQUEST:===>".$data);
		// $this->log("Data Sent by User===>".$data);
		// echo $requested_service;die;
		switch($requested_service){
			case 'SMS_VERIFICATION':
				App::uses('CustomerController', 'Controller');
				$userObj = new CustomerController();
				echo $this->SetLog($userObj->smsVerification($this->make_safe($myObj->{"mobile_no"})));
				unset($userObj);
			break;
			case 'POST_INSTALLATION':
				App::uses('CustomerController', 'Controller');
				$userObj = new CustomerController();
				echo $this->SetLog($userObj->postInstallation($this->make_safe($myObj->{"device_id"}),$this->make_safe($myObj->{"email_id"}),$this->make_safe($myObj->{"android_id"}),$this->make_safe($myObj->{"google_ad_id"})));
				unset($userObj);
			break;
			case 'LOGIN_SERVICE':
				App::uses('CustomerController', 'Controller');
				$userObj = new CustomerController();
				echo $this->SetLog($userObj->registerCustomer($this->make_safe($myObj->{"customer_id"}),$this->make_safe($myObj->{"mobile_no"}),$this->make_safe($myObj->{"device_id"}),$this->make_safe($myObj->{"referrer"})));
				unset($userObj);
			break;
			case 'GET_CAMPAIGNS':
				App::uses('CustomerController', 'Controller');
				$userObj = new CustomerController();
				echo $this->SetLog($userObj->getCampaignList($this->make_safe($myObj->{"customer_id"})));
				unset($userObj);
			break;
			case 'GET_CUSTOMER_DETAILS':
				App::uses('CustomerController', 'Controller');
				$userObj = new CustomerController();
				echo $this->SetLog($userObj->getCustomerDetails($this->make_safe($myObj->{"customer_id"})));
				unset($userObj);
			break;
			case 'TEST_SERVICE':
				App::uses('CustomerController', 'Controller');
				$userObj = new CustomerController();
				echo $this->SetLog($userObj->test());
				unset($userObj);
			break;
			
			default:
				$data="405";
				$this->SetLog($data);
			break;
		}
	 }
}
