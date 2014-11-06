<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
if (!validateSession()) {
	exit('SessionId is not valid.');
}
$userId = isset($_REQUEST['userId']) ? $_REQUEST['userId'] : null;
if (!$userId) {
	exit('UserId not valid.');
}

$GLOBALS['customUserId'] = $userId;
$authentication = new AuthenticationController();

if(empty($_SESSION['authenticated_user_id']) && $authentication->login($userId, '')) {
	$_SESSION['customUserId'] = $userId;
} else if($userId != $_SESSION['customUserId']){
	session_destroy();
	header('location:' . $_SERVER['REQUEST_URI']);
}

$crtObjectId = $_REQUEST['crtObjectId'];

//check if sesssion variable exists
if (isset($_SESSION['mCallVars_' . $crtObjectId])) {
	$vars = $_SESSION['mCallVars_' . $crtObjectId];
	
	$call = New Call();
	$call->retrieve($vars['callId']);
	$calTime = calculateHoursMin($call->date_start);
	$call->duration_hours = $calTime['hrs'];
	$call->duration_minutes = $calTime['min'];
	
	$beanId = $call->save();
	unset($_SESSION['mCallVars_' . $crtObjectId]);
	$redirectUrl = 'index.php?module=Calls&action=EditView&record=' . $beanId;
	header('location:' . $redirectUrl);
}
exit;