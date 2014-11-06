<?php
define('RECHECK_SESSION_AFTER', 15); //in minutes

function validateSession() {
	$valid = false;
	$crmSessionId = $_REQUEST['crmSessionId'];
	$checkDB = false;
	
	if (empty($crmSessionId)) {
		return $valid;
	}
	
	if (empty($_SESSION['authenticated_user_id']) || ((time() - $_SESSION['last_checked_session']) > RECHECK_SESSION_AFTER * 60)) {
		$checkDB = true;
	}
	
	if ($checkDB) {
		//check crmSessionId in db
		$db = DBManagerFactory::getInstance();
		$query = "SELECT id FROM micar_ameyo WHERE id='{$crmSessionId}'";
		$result = $db->query($query);
		if ($result->num_rows > 0) {
			$valid = true;
			$_SESSION['last_checked_session'] = time();
		}
	} else {
		$valid = true;
	}
	return $valid;
}

function logoutCustom() {
	session_destroy();
	ob_clean();
	sugar_cleanup(true);
}

function calculateHoursMin($dateTime) {
	$now = $GLOBALS['timedate']->nowDb();
	$diffSec = strtotime($now) - strtotime($dateTime);
	
	$hrs = (int)($diffSec / 3600);
	$min = (int)(($diffSec - $hrs * 3600) / 60);
	return array('hrs' => $hrs, 'min' => $min);
}