<?php 
/**
* FreshDoor Settings Page
*/
class FreshDoorSettings extends FreshDoor
{
	public $settingsArray;

	function __construct()
	{
		$settingsArray = array(
			'settings-menu' => array(
				'title' => 'FreshDoor',
				'slug' => $FreshDoor->pfix.'freshdoor_settings_menu',
				'settings-page' => array(
					'title' => 'FreshDoor Settings',
					'slug' => $FreshDoor->pfix.'freshdoor_settings_page',
					'settings-section' => array(
						'title' => 'FreshBooks Account Connection',
						'slug' => $FreshDoor->pfix.'freshbooks_account_connection',
						'settings-field' => array(
							'title' => 'FreshBooks Account Name ([name].freshbooks.com)',
							'slug' => $FreshDoor->pfix.'freshbooks_account_name',
						),
						'settings-field' => array(
							'title' => 'FreshBooks Account API Key',
							'slug' => $FreshDoor->pfix.'freshbooks_api_key'
						),
						'callback-function' => array('this', 'settings_sections_callback')
					)
				)
			)
		);

		add_action( 'admin_init', array('this', 'do_settings') );
	}

	private function do_settings() {

	}

	public function settings_sections_callback() {

	}
}