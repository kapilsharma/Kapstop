<?php
//This file is expected to return list of
// * available apps
// * installed apps
// * app details

$availableApps = array();
array_push($availableApps,'about');

$installedApps = array();

$ktaAbout = array();
$ktaAbout['title']="About";
$ktaAbout['layout']="full";

$installedApps['about']=$ktaAbout;

$ktaMsg = array();
$ktaMsg['title']="Msg";
$ktaMsg['layout']="full";

$installedApps['msg']=$ktaMsg;

$reqType = $_REQUEST['t'];

if($reqType=="insapp"){
	echo json_encode($installedApps);
	exit;
}else{
	
}
