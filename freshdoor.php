<?php
/*
Plugin Name: FreshDoor
Plugin URI: http://freshdoor.allstruck.org/
Description: A WordPress plugin to connect with and sync to/from FreshBooks using the FreshLibPHP API.
Version: 1.0
Author: AllStruck
Author URI: http://allstruck.com/
Copyright: 2012, AllStruck
*/

/* Include FreshLibPHP API */
	require_once "library/FreshLibPHP/Callback.php";
	require_once "library/FreshLibPHP/Client.php";

/* Include this app */
	require_once "library/app/app.php";

$FreshDoor = new FreshDoor();

?>