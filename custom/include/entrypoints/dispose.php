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

$db = DBManagerFactory::getInstance();
$queryCallId = "SELECT id_c, ameyo_call_id_c FROM calls_cstm c WHERE c.ameyo_call_id_c = '{$crtObjectId}'";
$result = $db->query($queryCallId);
//check if sesssion variable exists
if ($result->num_rows > 0) {
	$record = $db->fetchRow($result);
	$callId = $record['id_c'];
	
	$call = New Call();
	$call->retrieve($callId);
	$calTime = calculateHoursMin($call->date_start);
	$call->duration_hours = $calTime['hrs'];
	$call->duration_minutes = $calTime['min'];
	
	$beanId = $call->save();
	//unset($_SESSION['mCallVars_' . $crtObjectId]);
	$redirectUrl = 'index.php?module=Calls&action=EditView&record=' . $beanId;
	header('location:' . $redirectUrl);
}
exit;