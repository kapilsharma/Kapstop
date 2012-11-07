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
$ktaAbout['window']="iframe";
$ktaAbout['icon16']='http://local.kapstop.com/webapp/apps/about/images/icon16x16.jpg';

$installedApps['about']=$ktaAbout;

$ktaMsg = array();
$ktaMsg['title']="Msg";
$ktaMsg['window']="iframe";
$ktaMsg['icon16']="http://local.kapstop.com/webapp/apps/msg/images/icon16x16.png";

$installedApps['msg']=$ktaMsg;

$reqType = $_REQUEST['t'];

if($reqType=="insapp"){
	echo json_encode($installedApps);
	exit;
}else{
	
}
