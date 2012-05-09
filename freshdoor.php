<?php
/*
Plugin Name: FreshDoor
Plugin URI: http://freshdoor.allstruck.org/framework
Description: A WordPress plugin to connect with and sync to/from the FreshLibPHP API.
Version: 1.0
Author: AllStruck
Author URI: http://allstruck.com
Copyright: 2012, AllStruck

*/

/* Add settings page for connecting to FreshLibPHP API */


/* Include FreshLibPHP API */
	require_once "library/FreshLibPHP/Callback.php";
	require_once "library/FreshLibPHP/Client.php";


/* Connect to FreshLibPHP using API Key and Domain */
$url = "https://acmetestingco.FreshLibPHP.com/api/2.1/xml-in";
$token = "82cbd66a5966fcc2cb6f6d636b9ff291";

FreshLibPHP_HttpClient::init($url,$token);


function frdo_create_FreshLibPHP_webhook() {
	// Create WebHook
	$callback_verifier = 'cxbhxcbixcb9zh0bzcbc9zxhcbvxcbh9xbxhb9';

	$callback = new FreshLibPHP_CallBack();
	$callback->uri = 'http://dev.allstruck.org/' . 'xqlg94';
	$callback->event = 'all';
	$callback->verifier = $callback_verifier;
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



?>