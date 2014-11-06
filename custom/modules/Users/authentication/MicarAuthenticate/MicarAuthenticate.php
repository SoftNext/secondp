<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/Users/authentication/SugarAuthenticate/SugarAuthenticate.php');
class MicarAuthenticate extends SugarAuthenticate {
	var $userAuthenticateClass = 'MicarAuthenticateUser';
	var $authenticationDir = 'MicarAuthenticate';
	/**
	 * Constructs MicarAuthenticate
	 * This will load the user authentication class
	 *
	 * @return MicarAuthenticate
	 */
	function MicarAuthenticate(){
		parent::SugarAuthenticate();
	}
	
	function loginAuthenticate($username, $password) {
		return parent::loginAuthenticate($username, $password);
	}

}