<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'defend',
	'synonyms'  => array(
		$this->botNick.', defend!',
		$this->botNick.', defend.',
		$this->botNick.', defend'
	),
	'replies'   => array(
		"ACTION:puts on pants"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>
