<?php
/**
* FreshDoor PHP Class
*/

class FreshDoor
{
	public $pfix = "frdo_";
	
	public $url, $token;
	
	function __construct()
	{
		add_action('admin_menu', array('self', 'add_setting_page'));

		if ($user_account_name = get_option( $this->pfix.'user_account_name')) {
			$url = 'https://' .$user_account_name. '.freshbooks.com/api/2.1/xml-in';
		}
		if ($user_api_token = get_option( $this->pfix.'user_api_token')) {
			$token = $user_api_token;
		}

		if (!empty($token) && !empty($url)) {
			FreshLibPHP_HttpClient::init($url,$token);
		}
	}

	public function create_webhook() {
		if ($webhook_url_path = get_option( $this->pfix.'webhook_url_path' )) {		
			if ($callback_verifier = get_option( $this->pfix.'webhook_callback_verifier' )) {
				$callback = new FreshLibPHP_CallBack();
				$callback->uri = bloginfo( 'url' ) . '/' . $webhook_url_path; 
				$callback->event = 'all';
				$callback->verifier = $callback_verifier;
			}
		}
		/*
		// new Client object
		$client = new FreshLibPHP_Client();

		//try to get client with client_id 3
		if(!$client->get(3)){
		//no data - read error
			echo $client->lastError;
		}
		else{
		//investigate populated data
			print_r($client);
		}
		*/
	}

	public function synchronize_data() {

	}

	private function add_setting_page() {
		// add_options_page(settingsPageTitle, settingsMenuTitle,
		// 	settingsMenuCapability, settingsPageSlug,
		// 	settingsManagerFunction);
	}

}
