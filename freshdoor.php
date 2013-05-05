<?php
/*
Plugin Name: FreshDoor
Plugin URI: http://freshdoor.allstruck.org/
Description: A WordPress plugin to connect with and sync to/from FreshBooks using the FreshLibPHP API.
Version: 1.0
Author: AllStruck
Author URI: http://allstruck.com/
Copyright: 2013, AllStruck
*/

/*
	TODO:
		- Add checkbox settings to enable checked CPTs as WooCommerce Products.
		- Inital sync from FreshBooks -> WordPress CPT (items and tasks).
		- Add field on WooCommerce Products admin to map to FreshBooks Item/Task.
		- Sync to FreshBooks when WP CPTs changes.
		- Add a webhook from FreshBooks -> WordPress.
		- Sync to WordPress CTPs when FB changes.
		- Add FreshBooks as a payment gateway in WooCommerce.
		- Create unpaid invoice with WooCommerce checkout using our custom gateway.
		- Create paid invoice with WooCommerce checkout using other gateway.
		- Add method for uninstall (remove all data).
*/

	define('FRDO_PATH', plugin_dir_path( __FILE__ ));
	define('FRDO_URL', plugin_dir_url( __FILE__ ));

/* Include FreshLibPHP API */
	require_once FRDO_PATH . '/library/FreshLibPHP/Callback.php';
	require_once FRDO_PATH . 'library/FreshLibPHP/Client.php';

/* Include this app */
	require_once FRDO_PATH . 'library/app/app.php';
	require_once FRDO_PATH . 'library/app/settings.php';
	require_once FRDO_PATH . 'library/app/post-types.php';

$FD = new FreshDoor();
$FDS = new FreshDoorSettings();
$FDPT = new FreshDoorPostTypes();