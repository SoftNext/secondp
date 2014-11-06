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
	
	//create a new call
	$call = New Call();
	$call->parent_id = $vars['beanId'];
	$call->parent_type = ($vars['type'] == 'a') ? 'Accounts' : 'Leads';
	$call->status = 'Held';
	$call->assigned_user_id = $_SESSION['authenticated_user_id'];
	$call->name = 'Created through dispose';
	$call->date_start = $vars['startTime'];
	$calTime = calculateHoursMin($vars['startTime']);
	$call->duration_hours = $calTime['hrs'];
	$call->duration_minutes = $calTime['min'];
	//@todo - campaign, start time, duration read only
	$beanId = $call->save();
	unset($_SESSION['mCallVars_' . $crtObjectId]);
	$redirectUrl = 'index.php?module=Calls&action=EditView&record=' . $beanId;
	header('location:' . $redirectUrl);
}
exit;