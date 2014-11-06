<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$entry_point_registry['kb'] = array('file' => 'custom/include/entrypoints/kb.php','auth' => false);
$entry_point_registry['call'] = array('file' => 'custom/include/entrypoints/call.php','auth' => false);
$entry_point_registry['dispose'] = array('file' => 'custom/include/entrypoints/dispose.php','auth' => false);
$entry_point_registry['login_logout'] = array('file' => 'custom/include/entrypoints/login_logout.php','auth' => false);

