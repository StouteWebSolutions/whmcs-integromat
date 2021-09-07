<?php
use WHMCS\Database\Capsule;
function integromat_link()
{
	$data = Capsule::table('tbladdonmodules')
	->where('setting', '=', 'webhookURL')
	->where('module', '=', 'integromat')
	->first();
	$url = $data->value;
	return $url;
};
// Trigger when a client is added - TESTED
add_hook('ClientAdd', 1, function($vars) {
	$url = integromat_link();
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $vars);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	return curl_exec($curl);
});

// Trigger when a client has been closed - TESTED
add_hook('ClientClose', 1, function($vars) {
	$url = integromat_link();
	$userid = $vars['userid'];
	
	// Get Client Details
	$command = 'GetClientsDetails';
	$postData = array(
		'clientid'	=> $userid,
		'stats'		=> true,
	);
	$data = localAPI($command, $postData);
	
	// Send Data to Integromat	
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	return curl_exec($curl);
});

// Trigger when a client is edited - TESTED
add_hook('ClientEdit', 1, function($vars) {
	$url = integromat_link();
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $vars);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	return curl_exec($curl);
});

// Trigger when a contact is added to a client - TESTED
add_hook('ContactAdd', 1, function($vars) {
	$url = integromat_link();
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $vars);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	return curl_exec($curl);
});

// Trigger when a contact is edited - TESTED
add_hook('ContactEdit', 1, function($vars) {
	$url = integromat_link();
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POSTFIELDS, $vars);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	return curl_exec($curl);
});