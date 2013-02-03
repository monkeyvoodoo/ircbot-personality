<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'cookie',
	'synonyms'  => array(
		'gives '.$this->ircClass->getNick().' a cookie'
	),
	'replies'   => array("ACTION:noms on the cookie\nUmai!"),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>