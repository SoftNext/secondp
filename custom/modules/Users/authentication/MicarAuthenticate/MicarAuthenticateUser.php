<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/Users/authentication/SugarAuthenticate/SugarAuthenticateUser.php');
class MicarAuthenticateUser extends SugarAuthenticateUser {
	
	/**
	 * this is called when a user logs in
	 *
	 * @param STRING $name
	 * @param STRING $password
	 * @param STRING $fallback - is this authentication a fallback from a failed authentication
	 * @return boolean
	 */
	function loadUserOnLogin($name, $password, $fallback = false, $PARAMS = array()) {
		global $login_error;
		
		//checking if userId is present in request
		$name = $_REQUEST['userId'];
	
		$GLOBALS['log']->debug("Starting user load for ". $name);
		//if(empty($name) || empty($password)) return false;
		$input_hash = $password;
		$passwordEncrypted = false;
		if (!empty($PARAMS) && isset($PARAMS['passwordEncrypted']) && $PARAMS['passwordEncrypted']) {
			$passwordEncrypted = true;
		}// if
		if (!$passwordEncrypted) {
			$input_hash = SugarAuthenticate::encodePassword($password);
		} // if
		$user_id = $this->authenticateUser($name, $input_hash, $fallback);
		if(empty($user_id)) {
			$GLOBALS['log']->fatal('SECURITY: User authentication for '.$name.' failed');
			return false;
		}
		$this->loadUserOnSession($user_id);
		return true;
	}
	
	/**
	 * Does the actual authentication of the user and returns an id that will be used
	 * to load the current user (loadUserOnSession)
	 *
	 * @param STRING $name
	 * @param STRING $password
	 * @param STRING $fallback - is this authentication a fallback from a failed authentication
	 * @return STRING id - used for loading the user
	 */
	function authenticateUser($name, $password, $fallback=false) {
		if (isset($GLOBALS['customUserId']) && !empty($GLOBALS['customUserId'])) {
			$GLOBALS['log']->debug("Is a DACX login attempt. Continuing");
		} else {
			// we'll use the default authentication since the user is not logging in through Ameyo
			$GLOBALS['log']->debug("Not a DACX login attempt. Referring to default authentication");
			return parent::authenticateUser($name, $password, $fallback);
		}

		$name = $GLOBALS['db']->quote($name);
		$query = "SELECT * from users where user_name='$name' AND (portal_only IS NULL OR portal_only !='1') AND (is_group IS NULL OR is_group !='1') AND status !='Inactive'";
		$result =$GLOBALS['db']->limitQuery($query,0,1,false);
		$row = $GLOBALS['db']->fetchByAssoc($result);

		// set the ID in the seed user.  This can be used for retrieving the full user record later
		//if it's falling back on Sugar Authentication after the login failed on an external authentication return empty if the user has external_auth_disabled for them
		if (empty ($row) || ($fallback && !empty($row['external_auth_only']))) {
			return '';
		} else {
			return $row['id'];
		}
	}

}