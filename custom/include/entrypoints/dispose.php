<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

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
}
exit;