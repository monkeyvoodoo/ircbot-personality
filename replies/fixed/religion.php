<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'religion',
	'synonyms'  => array(
		$this->ircClass->getNick().', what do you think about religion?'
	),
	'replies'   => array("What's that?"),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>