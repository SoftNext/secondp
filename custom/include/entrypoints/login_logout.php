<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$requestXml = isset($_REQUEST['requestXml']) ? $_REQUEST['requestXml'] : null;
$requestXml = html_entity_decode($requestXml);

$xml = simplexml_load_string($requestXml);
foreach ($xml->children() as $data) {
    ${$data->getName()} = (string)$data;
}


$authentication = new AuthenticationController();
$db = DBManagerFactory::getInstance();
$response = '';
if ($command == 'login') {
	$response = "<response><status>#STATUS#</status><message></message><crmSessionId>#CRM_SESSION_ID#</crmSessionId></response>";
	
	if($authentication->login($userId, $password)) {
		$uuid = create_guid();
		$response = str_replace('#STATUS#', 'success', $response);
		$response = str_replace('#CRM_SESSION_ID#', $uuid, $response);
		
		//create an entry into micar_ameyo table
		$query = "INSERT INTO micar_ameyo VALUES('" . $uuid . "', '" . $GLOBALS['timedate']->nowDb() . "')";
		$db->query($query);
	} else {
		$response = str_replace('#STATUS#', 'failed', $response);
	}
} else if ($command == 'logout') {
	$response = "<response><status>#STATUS#</status><message></message></response>";
	$response = str_replace('#STATUS#', 'success', $response);
	//$authentication->logout();
	//delete entry from micar_ameyo table
	if (!empty($crmSessionId)) {
		$query = "DELETE from micar_ameyo WHERE id='{$crmSessionId}'";
		$db->query($query);
	}
}
echo $response;
exit;