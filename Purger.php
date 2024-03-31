<?php

class PurgerPlugin extends MantisPlugin {

	function register() {
		$this->name        = lang_get( 'plugin_Purger_name' );
		$this->description = lang_get( 'plugin_Purger_description' );
		$this->version     = '1.0.0';
		$this->requires    = array('MantisCore'       => '2.0.0',);
		$this->author      = 'Cas Nuy';
		$this->contact     = 'Cas-at-nuy.info';
		$this->url         = 'https://github.com/mantisbt-plugins/Purger';
		$this->page			= 'config';
	}

 	function config() {
		return array(
			'manage_threshold'	=> ADMINISTRATOR,
			'status'			=> 90,
			);
	}

	function init() {
		plugin_event_hook( 'EVENT_MENU_MANAGE',	'purge_them' );
	}

 	function purge_them() {
				return array( '<a href="' . plugin_page( 'purge_issues' ) . '">' . lang_get( 'plugin_Purger_manage' ) .  '</a>', );
	}

}