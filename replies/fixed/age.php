<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'age',
	'synonyms'  => array(
		$this->botNick.', how old are you?',
		'How old are you, '.$this->botNick.'?',
		$this->botNick.' how old are you?',
		'How old are you '.$this->botNick.'?',
		$this->botNick.' how old are you',
		'How old are you '.$this->botNick),
	'replies'   => array(
		"I'm eleven!"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>