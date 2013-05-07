<?php
/**	
 * FRESHDOOR
 * Main Class
 */

class FreshDoor
{
	const pfix = "frdo_";
	
	public $url;
	public $token;

	public $fbapi;
	
	public function __construct() {
		if ($user_account_name = get_option( self::pfix.'freshbooks_settings_user')) {
			$this->url = 'https://' .$user_account_name. '.freshbooks.com/api/2.1/xml-in';
		}
		if ($user_api_token = get_option( self::pfix.'freshbooks_settings_api_key')) {
			$this->token = $this->decrypt($user_api_token, SECURE_AUTH_KEY);
		}

		if (!empty($this->token) && !empty($this->url)) {
			$this->fbapi = FreshBooks_HttpClient::init($this->url,$this->token);
		}
	}

	public function create_webhook() {
		if ($webhook_url_path = get_option( self::pfix.'webhook_url_path' )) {		
			if ($callback_verifier = get_option( self::pfix.'webhook_callback_verifier' )) {
				$callback = new FreshLibPHP_CallBack();
				$callback->uri = bloginfo( 'url' ) . '/' . $webhook_url_path; 
				$callback->event = 'all';
				$callback->verifier = $callback_verifier;
			}
		}
	}

	public function synchronize_data() {

	}

	public function remote_list_items() {
		//FreshBooks_HttpClient::init($this->url,$this->token);
		$item = new FreshBooks_Item();

		$item->listing($rows, $resultInfo, 1, 100, array('folder' => 'active'));

		return $rows;
	}

	public function remote_get_item($id) {
		$item = new FreshBooks_Item();

		if (!$client->get($id)) {
			//no data - read error
	        return $client->lastError;
		} else {
		//investigate populated data
			print_r($client);
		}
	}

	public function api_test() {
		$test = new FreshBooks_Item();
		return $test->listing($rows, $resultInfo, 1, 1);
	}

	function encrypt($input_string, $key){
	    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	    $h_key = hash('sha256', $key, TRUE);
	    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $h_key, $input_string, MCRYPT_MODE_ECB, $iv));
	}

	function decrypt($encrypted_input_string, $key){
	    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	    $h_key = hash('sha256', $key, TRUE);
	    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $h_key, base64_decode($encrypted_input_string), MCRYPT_MODE_ECB, $iv));
	}

}
