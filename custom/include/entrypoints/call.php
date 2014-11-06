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
$queryAccounts = "SELECT id FROM accounts a WHERE a.phone_office = '{$phone}'";
$result = $db->query($queryAccounts);
if ($result->num_rows == 0) {
	//check in leads
	//@todo - check for active leads
	$queryLeads = "SELECT id FROM leads l WHERE l.phone_mobile = '{$phone}'";
	$result = $db->query($queryLeads);
	if ($result->num_rows > 0) {
		$record = $db->fetchRow($result);
		$beanId = $record['id'];
		$redirectUrl = 'index.php?module=Leads&action=DetailView&record=' . $beanId;
	} else {
		$bean = New Lead();
		$bean->phone_mobile = $phone;
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
$_SESSION['mCallVars_' . $crtObjectId] = array('type' => $type, 'beanId' => $beanId, 'crtObjectId' => $crtObjectId, 'startTime' => $GLOBALS['timedate']->nowDb());
header('location:' . $redirectUrl);
exit;