<?php
App::uses('CakeEmail', 'Network/Email');
// error_reporting(2);
class CustomerController extends AppController {

	public $uses = array('Customer');
	
	public function index() {
		// $this -> set('users', $this -> Customer -> find('all'));
	}
	
	/*
	 *	Function Name	: getCustomerDetails
	 *	Description		: Used to get Customer Details according to Customer IDs
	 *	Parameter		: customer_id
	 *	Return			: Array of Customer Details
	 */
	public function getCustomerDetails($customer_id){
		$response = array();
		$blank_array = array();
		if($customer_id) {
			$error = $this->checkIntegerType($customer_id);
			if(empty($error)){
				$response["customer_details"] = $this->getCustomerDetailsByCustomerID($customer_id);
			}else{
				$response["error_code"] = Configure::read('RESPONSE_GENERAL_ERROR');
				$response["error_desc"] = $error;
			}
		}else{
			$response["error_code"] = Configure::read('RESPONSE_GENERAL_ERROR');
			$response["error_desc"] = Configure::read('INPUT_MISSING_DESC');
		}
		return CJSON::encode($response);
	}
	
	/*
	 *	Function Name	: smsVerification;
	 *	Description		: Used to Send an SMS with OTP to the Mobile Number provided by User
	 *	Parameter		: mobile_no
	 *	Return			: Status(1=>Success,2=>Error);
	 */
	public function smsVerification($mobile_no) {
		$response = array();
		if($mobile_no){
			//code for Sending SMS
			$OTP = $this->GenerateOTP();
			if($OTP) {
				$response['OTP']=$OTP;
				$response['sms_status']='1';
			}
			else {
				$response['sms_status']='0';
			}
		} else {
			$response["error_code"] = Configure::read('RESPONSE_GENERAL_ERROR');
			$response["error_desc"] = Configure::read('INPUT_MISSING_DESC');
		}
		return CJSON::encode($response);
	}

	/*
	 *	Function Name	: registerCustomer;
	 *	Description		: Check if Mobile Number Already Registered if not Save Customer Data.
	 *	Parameter		: mobile_no,email_id,android_id,device_id,field_one,field_two
	 *	Return			: IF Exists	=> Array of UserDetails and Apps
	 					  IF New	=> New Customer Id and Array of Apps for New User
	 */
	public function registerCustomer($customer_id=null,$mobile_no=null,$android_id=null,$referrer=null) {
		// echo $mobile_no." ".$email_id." ".$android_id." ".$device_id." ".$field_one." ".$field_two;die;
		$response = array();
		$blank_array = array();
		if ($mobile_no && $android_id) {
			$result_data = $this -> Customer -> find('all',
				array(
					'conditions' => array(
						'mobile_no' => $mobile_no,
					)
				)
			);
			/* User Already Exists */
			if (count($result_data) > 0) {
				if($android_id != $result_data[0]["Customer"]["android_id"]){
					$this->loadModel('CustomersHistory');
					$data = $result_data[0]["Customer"];
					$data["customer_id"]= $data["id"];
					$data["id"]="";
					if($this->CustomersHistory->save($data)) {
						$fields = array('android_id' => "'".$android_id."'");
						$conditions = array('Customer.id' => $result_data[0]["Customer"]["id"]);
						if($this->Customer->updateAll($fields,$conditions)){
							$response["message"] = $this->base64encode(DEVICE_ID_UPDATED);
						}
					}
				}
				$customer_data = array();
				$customer_data["customer_id"]	= $this->base64encode($result_data[0]["Customer"]["id"]);
				$customer_data["mobile_no"]		= $this->base64encode($result_data[0]["Customer"]["mobile_no"]);
				$customer_data["my_earning"]	= $this->base64encode($result_data[0]["Customer"]["my_earning"]);
				$customer_data["referral_code"]	= $this->base64encode($result_data[0]["Customer"]["referral_code"]);
				
				$campaigns_data = $this->getCampaigns($result_data[0]["Customer"]["id"]);
				$response["customer_data"]	= $customer_data;
				$response["campaigns_list"]	= $campaigns_data;
			}else { /* New User */
				$new_customer = array();
				$new_customer["id"]			= $customer_id;
				$new_customer["mobile_no"]	= $mobile_no;
				$new_customer["android_id"]	= $android_id;
				$new_customer["my_earning"]	= SIGNUP_AMOUNT;
				$new_customer["referral_code"]	= $this->GenerateAlphaNumericString();
				if ($this -> Customer -> saveAll($new_customer)) {
					$response["customer_data"] = $this->getCustomerDetails($this->Customer->id);  
					$response["campaigns_list"] = $this->getCampaigns($this->Customer->id);
				} else {
					$response["error_code"] = $this->base64encode(Configure::read('RESPONSE_GENERAL_ERROR'));
					$response["error_desc"] = $this->base64encode(DATA_NOT_SAVED);
				}
			}
		} else {
			$response["error_code"] = $this->base64encode(Configure::read('RESPONSE_GENERAL_ERROR'));
			$response["error_desc"] = $this->base64encode(Configure::read('INPUT_MISSING_DESC'));
		}
		return CJSON::encode($response);
	}

	/*
	 *	Function Name	: postInstallation;
	 *	Description		: Check if Device Id Already Registered if not Save Data.
	 *	Parameter		: email_id,android_id,device_id,$google_ad_id
	 *	Return			: IF Exists	=> Array of UserDetails and Apps
	 					  IF New	=> New Customer Id and Array of Apps for New User
	 */
	public function postInstallation($device_id, $email_id, $android_id, $google_ad_id) {
		$response = array();
		if($android_id!="") {
			$this->loadModel('AppTrackInfo');
			$response["status"]=$this->base64encode(1);
			$user_data = $this->Customer->find('all',
				array(
					'conditions'=>array(
						'android_id'=>$android_id
					)
				)
			);
			if(empty($user_data)) {
				$customer_data = array();
				$customer_data["device_id"]		= $device_id;
				$customer_data["email_id"]		= $email_id;
				$customer_data["android_id"]	= $android_id;
				$customer_data["google_ad_id"]	= $google_ad_id;
				if($this->Customer->saveAll($customer_data)) {
					$response["status"]=$this->base64encode(1);
					$response["customer_id"] = $this->base64encode($this->Customer->id);
				}else {
					$response["status"]=$this->base64encode(0);
				}
			}else {
				$response["customer_id"] = $user_data[0]["Customer"]["id"];
			}
		}else {
			$response["error_code"] = $this->base64encode(Configure::read('RESPONSE_GENERAL_ERROR'));
			$response["error_desc"] = $this->base64encode(Configure::read('INPUT_MISSING_DESC'));
		}
		return CJSON::encode($response);
	}
	
	/*
	 *	Function Name	: getCampaigns
	 *	Description		: Get Campaign List according to CustomerID
	 *	Parameter		: customer_id
	 *	Return			: campaign_list
	 */
	public function getCampaignList($customer_id = null){
		$response = array();
		if($customer_id) {
			// $error = $this->checkIntegerType($customer_id);
			if(empty($error)){
				// pr($this->getCampaigns($customer_id));die;
				$response["campaigns_list"] = $this->getCampaigns($customer_id);
			}else {
				$response["error_code"] = $this->base64encode(Configure::read('RESPONSE_GENERAL_ERROR'));
				$response["error_desc"] = $error;	
			}
		}else {
			$response["error_code"] = $this->base64encode(Configure::read('RESPONSE_GENERAL_ERROR'));
			$response["error_desc"] = $this->base64encode(Configure::read('INPUT_MISSING_DESC'));
		}
		// pr($response);die;
		return CJSON::encode($response);
	}
	
	public function test(){
		echo "TEST";
		// $test = $this->getCampaigns(1);
		// $data = $this->GenerateAlphaNumericString();
		// $data = $this->getCustomerDetails(21111);
		// pr($data);die;
		/*
			$this->loadModel('AppTrackInfo');
			$today = date('Y-m-d');
			$data = $this->AppTrackInfo->find('all',array('conditions'=>array('tracked_on'=>$today)));
		*/
		/*
		$this->loadModel('CustomersHistory');
				$result_data = $this -> Customer -> find('all',
						array(
							'conditions' => array(
								'mobile_no' => 9873113703,
							)
						)
					);
				$data = $result_data[0]["Customer"];
				$data["customer_id"]= $data["id"];
				$data["id"]="";
				// pr($data);die;
				if($this->CustomersHistory->save($data)) {
					echo "Success";die;
				}
				else {
					echo "Not able to save";
				}*/
		
		if($this->sendEmail($ToEmailId, $FromEmailId)){
			echo 1;die;
		}else{
			echo 0;die;
		}
	}

}
?>
