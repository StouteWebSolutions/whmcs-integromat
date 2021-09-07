<?php
use WHMCS\Database\Capsule;
if (!defined("WHMCS")) {
	die("This file cannot be accessed directly");
}

function integromat_config()
{
	return [
		'name'			=> 'Integromat',
		'description'	=> 'This module adds integromat integration via webhook',
		'author'		=> 'Paul Stoute',
		'language'		=> 'english',
		'version'		=> '1.1',
		'fields'		=> [
			'webhookURL'	=> [
				'FriendlyName'	=> 'Webhook URL',
				'Type'			=> 'text',
				'size'			=> '50',
				'Default'		=> 'https://hook.integromat.com/...',
				'Description'	=> 'Add the integromat webhook URL',
			]
		]
	];
}