<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 *
 * @package       app.Controller
 */
App::uses('Controller', 'Controller');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 */

class AppController extends Controller {
	/*
	 * Function Name	: RestData
	 * Description		: Gets the service requests methods.
	 * Input Parameters : None
	 * Returns			: Response input data in json format in string format.
	 */

	/* function for set service request*/
	public function RestData() {
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			return stripslashes($_GET["data"]);
		} else {
			return stripslashes(file_get_contents('php://input'));
		}
	}

	
	/*
	 * Function Name	: SetLog
	 * Description		: Get json data log it and return back.
	 * Input Parameters	: Response after service request execution
	 * Returns			: Response input data in json format.
	 */
	public function SetLog($result_data) {
		$this -> log("RESPONSE:==>" . $result_data);
		// $this -> log("Data in Response==>" . $result_data);
		return $result_data;
	}
	
	/*
	 * Function Name	: make_safe
	 * Description		: Used to decode the base64 Encoded request.
	 * Input Parameters	: String or variable to be Decoded
	 * Returns			: Decoded base64 string
	 */
	public function make_safe($string) {
		// $string=base64_decode($string);
		//pr($string);
		// return mysql_real_escape_string(trim($string));
		return $string;
	}

	/*
	 * Function Name	: base64encode
	 * Description		: Used to encode the value into base64.
	 * Input Parameters	: String or variable to be encoded
	 * Returns			: Decoded base64 string
	 */
	public function base64encode($string) {
		// return base64_encode(trim($string));
		return trim($string);
	}
	
	
	
	 /*
	  * Function Name	: GenerateOTP
	  * Description		: Generate OTP for New Users
	  * Input Parameters: response after service request execution
	  * Returns			: Response input data in json format.
	 */
	public function GenerateOTP() {
		$length = 5;
		$min = pow(10, $length - 1) ;
		$max = pow(10, $length) - 1;
		return mt_rand($min, $max);
	}
	
	/*
	 * Function Name	: GenerateAlphaNumericString
	 * Description		: Generate AlphaNumeric number
	 * Input Parameters	: none
	 * Returns			: 6 Digit Alphanumeric String
	 */

	public function GenerateAlphaNumericString() {

		$salt = "ABCDE0123FGHJKLMNPRSTUVW45XYZabch6efghjkmnpqrs789tuvwxyz";
		$tokenLength = 6;
		mt_srand((double)microtime() * 1000000);
		for ($i = 0; $i < $tokenLength; $i++) {
			$num = mt_rand() % 56;
			$tmp = substr($salt, $num, 1);
			$pass = $pass . $tmp;
		}
		return $pass;
	}
	
	/*
	 * Function Name	: fileUpload
	 * Description		: Used to upload File
	 * Input Parameters	: upload_file, upload_path
	 * Returns			: True if uploaded otherwise false
	 */
	public function fileUpload($upload_file,$upload_path) {
		if($upload_file){
			return (move_uploaded_file($upload_file['tmp_name'], $upload_path)) ? TRUE :FALSE;			
		}
	}
	
	/*
	 * Function Name	: convertDates
	 * Description		: Convert Date compatible to store in database
	 * Input Parameters	: value //date
	 * Returns			: date if success empty otherwise
	 */
	public function convertDates($value='') {
		$data = "";
		if($value){
			$data = date('Y-m-d', strtotime($value));
			return $data;
		}
		else {
			return $data;
		}
	}
	/*
	 * Function Name	: isLoggedIn
	 * Description		: Check user is logged in or not
	 * Input Parameters	: null 
	 */

	public function isLoggedIn() {
		$sessionComponent = $this -> Components -> load('Session');
		$user_session_data = $sessionComponent -> read('logged_user_data');
		if ($user_session_data == "" || (!isset($user_session_data[0]))) {
			$this -> Session -> setFlash(LOGIN_TO_VIEW_DETAILS,'alert-box', array('class'=>'alert-danger'));
			$this -> redirect('/Admin/login');
		}
	}

	/*
	 * Function Name	: getLoggedInUserName
	 * Description		: Return user name
	 * Input Parameters	: null
	 * Returns			: Data of Logged in User(Admin)
	 */

	public function getLoggedInUserName() {
		$sessionComponent = $this -> Components -> load('Session');
		$user_session_data = $sessionComponent -> read('logged_user_data');
		// pr($user_session_data);die;
		if ($user_session_data != "" || (isset($user_session_data[0]))) {
			return $user_session_data[0]['Admin']['username'];
		}
	}

	/*
	 * Function Name	: logout
	 * Description		: Delete session to logout
	 * Input Parameters	: null
	 * Returns			: Log out User
	 */

	public function logout() {
		$this -> Session -> delete('logged_user_data');
		$this -> Session -> delete('Admin.username');
		// $this -> Session -> setFlash(LOGOUT_SUCCESSFULLY, 'success');
		$this -> Session -> setFlash(LOGOUT_SUCCESSFULLY, 'alert-box', array('class'=>'alert-success'));
		$this -> redirect('/Admin/login');
	}

	/*
	 * Function Name	: getCampaigns
	 * Description		: Get Campaigns By Customer Id
	 * Input Parameters	: customer_id
	 * Returns			: Array of Campaigns
	 */
	
	public function getCampaigns($customer_id){
		// echo $customer_id;die;
		$response = array();
		$blank_array = array();
		if($customer_id) {
			$this->loadModel('Customer');
			$this->loadModel('Campaign');
			
			$cmObj = new Customer();
		/* Getting All the Campaigns According to the Customer */
			$campaigns_data = $cmObj -> query("CALL GetCampaigns('" . $customer_id . "')");
			if(count($campaigns_data)>0) {
				$temp_campaign	= array();
				$campaigns_list	= array();
				foreach ($campaigns_data as $key => $value) {
					$temp_campaign['campaign_id']		= $this->base64encode($value['CMP']['id']);
					$temp_campaign['title']				= $this->base64encode($value['CMP']['title']);
					$temp_campaign['package_name']		= $this->base64encode($value['CMP']['package_name']);
					// $temp_campaign['pay_old_users'] 	= $this->base64encode($value['CMP']['pay_old_users']);
					$temp_campaign['app_logo']			= $this->base64encode(SITE_URL."Uploads/".$value['CMP']['app_logo_name']);
					$temp_campaign['app_download_link']	= $this->base64encode($value['CMP']['app_download_link']);
					$campaigns_list []= $temp_campaign;
				}
			}else {
				$campaigns_list = $blank_array;
			}
			return $campaigns_list;
		}
		
	}

	/*
	 *	Function Name	: getCustomerDetailsByCustomerID
	 *	Description		: Used to get Customer Details according to Customer IDs
	 *	Parameter		: customer_id
	 *	Return			: Array of Customer Details
	 */
	public function getCustomerDetailsByCustomerID($customer_id){
		
		$customer_data = array();
		$blank_array = array();
		if($customer_id) {
			$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $customer_id));
			$data = $this->Customer->find('first', $options);
			if(!empty($data)){
				$customer_details = array();
				$customer_details['customer_id']	= $this->base64encode($data['Customer']['id']);
				$customer_details['mobile_no']		= $this->base64encode($data['Customer']['mobile_no']);
				$customer_details['email_id']		= $this->base64encode($data['Customer']['email_id']);
				$customer_details['my_bucks']		= $this->base64encode($data['Customer']['my_bucks']);
				$customer_details['referral_code']	= $this->base64encode($data['Customer']['referral_code']);
				$customer_data[] = $customer_details;
			}else{
				$customer_data = $blank_array; 
			}
			return $customer_data;
		}
	}
	
	/*
	 * Function Name	: checkIntegerType
	 * Description		: Check if the value is INTEGER or NOT
	 * Input Parameters	: $value to be checked
	 * Returns			: Error if not integer
	 */

	public function checkIntegerType($value) {
		$error='';
		if (!filter_var($value, FILTER_VALIDATE_INT)) {
			$error=INVALID_INTEGET_VALUE;
		}
		return $error;
	}
	
	/*Function Name		: sendEmail
	 *Description		: Send Email
	 *Parameters		: EmailId,templete,data
	 */
	public function sendEmail($ToEmailId,$FromEmailId) {

		$layout = "gmail";
		$Email = new CakeEmail();
		$Email -> config('gmail');
		$Email -> from(TEST_FROM);
		$Email ->to(TEST_EMAIL);
		$Email -> subject('Welcome to TaskBucks');
		$Email -> emailFormat('html');
		if ($Email -> send()) {
			return true;
		} else
			return false;

	}

}
