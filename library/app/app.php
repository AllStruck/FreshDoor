<?php
/*	= FreshDoor =
 * Main Class
 */

class FreshDoor
{
	const pfix = "frdo_";
	
	public $url;
	public $token;
	
	public function __construct() {
		if ($user_account_name = get_option( self::pfix.'user_account_name')) {
			$url = 'https://' .$user_account_name. '.freshbooks.com/api/2.1/xml-in';
		}
		if ($user_api_token = get_option( self::pfix.'user_api_token')) {
			$token = $user_api_token;
		}

		if (!empty($token) && !empty($url)) {
			FreshLibPHP_HttpClient::init($url,$token);
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
}
