<?php
/*
Plugin Name: FreshDoor
Plugin URI: http://freshdoor.allstruck.org/framework
Description: A WordPress plugin to connect with and sync to/from the FreshBooks API.
Version: 1.0
Author: AllStruck
Author URI: http://allstruck.com
Copyright: 2012, AllStruck

*/

/* Add settings page for connecting to FreshBooks API */


/* Include FreshBooks API */


/* Connect to FreshBooks using API Key and Domain */
$url = "https://acmetestingco.freshbooks.com/api/2.1/xml-in";
$token = "82cbd66a5966fcc2cb6f6d636b9ff291";

// Init FreshBooks_HttpClient
if (!class_exists('FreshBooks_HttpClient')) {
	//require_once "library/FreshBooks/Client.php";
}
FreshBooks_HttpClient::init($url,$token);

// Load FreshBooks callback API if not available
if (/*!method_exists('FreshBooks_HttpClient', 'FreshBooks_CallBack')*/false) {
	require_once "library/FreshBooks/Callback.php";
}

function frdo_create_freshbooks_webhook() {
	// Create WebHook
	$callback_verifier = 'cxbhxcbixcb9zh0bzcbc9zxhcbvxcbh9xbxhb9';

	$callback = new FreshBooks_CallBack();
	$callback->uri = 'http://dev.allstruck.org/' . 'xqlg94';
	$callback->event = 'all';
	$callback->verifier = $callback_verifier;
}


/*
// new Client object
$client = new FreshBooks_Client();

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



?>