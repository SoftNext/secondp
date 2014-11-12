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


$phone = $_REQUEST['phone'];
$crtObjectId = $_REQUEST['crtObjectId'];

//query accounts and lead to check if number already exists
$type = '';
$beanId = '';
$db = DBManagerFactory::getInstance();
$phoneStripped = str_replace('+91', '', ltrim($phone, '0'));
$phone = '+91' . $phoneStripped;
$phoneZero = '0' . $phoneStripped;
$queryAccounts = "SELECT id FROM accounts a WHERE (a.phone_office = '{$phone}' OR a.phone_office = '{$phoneStripped}' OR a.phone_office = '{$phoneZero}') AND a.deleted = 0";
$result = $db->query($queryAccounts);
if ($result->num_rows == 0) {
	//check in leads
	$queryLeads = "SELECT id FROM leads l WHERE (l.phone_mobile = '{$phone}' OR l.phone_mobile = '{$phoneStripped}' OR l.phone_mobile = '{$phoneZero}') AND l.converted = 0 AND l.deleted = 0";
	$result = $db->query($queryLeads);
	if ($result->num_rows > 0) {
		$record = $db->fetchRow($result);
		$beanId = $record['id'];
		$redirectUrl = 'index.php?module=Leads&action=DetailView&record=' . $beanId;
	} else {
		$bean = New Lead();
		$bean->phone_mobile = $phone;
		$bean->assigned_user_id = $_SESSION['authenticated_user_id'];
		$beanId = $bean->save();
		$redirectUrl = 'index.php?module=Leads&action=EditView&record=' . $beanId;
	}
	$type = 'l';
} else {
	$record = $db->fetchRow($result);
	$beanId = $record['id'];
	$redirectUrl = 'index.php?module=Accounts&action=DetailView&record=' . $beanId;
	$type = 'a';
}

$customerId = $_REQUEST['customerId'];
$callType = empty($customerId) ? 'Inbound' : 'Outbound';

//create a new call
$call = New Call();
$call->parent_id 		= $beanId;
$call->parent_type 		= ($type == 'a') ? 'Accounts' : 'Leads';
$call->status 			= 'Held';
$call->assigned_user_id = $_SESSION['authenticated_user_id'];
$call->name 			= 'Created through call - Ameyo';
$call->date_start 		= $GLOBALS['timedate']->nowDb();
$call->ameyo_call_id_c 	= $_REQUEST['crtObjectId'];
$call->direction 		= $callType;
$callId = $call->save();

//@todo - campaign

//$_SESSION['mCallVars_' . $crtObjectId] = array('callId' => $callId);
header('location:' . $redirectUrl);
exit;
