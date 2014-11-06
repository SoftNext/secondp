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

$homeUrl = 'location:index.php?module=Home&action=index';

if(empty($_SESSION['authenticated_user_id']) && $authentication->login($userId, '')) {
	$_SESSION['customUserId'] = $userId;
	header($homeUrl);
}
else if($userId == $_SESSION['customUserId']) {
	header($homeUrl);
} else {
	session_destroy();
	header('location:' . $_SERVER['REQUEST_URI']);
}
exit;