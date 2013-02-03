<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'sister',
	'synonyms'  => array(
		$this->ircClass->getNick().', do you have an onee-chan?',
		'Do you have an onee-chan, '.$this->ircClass->getNick().'?',
		$this->ircClass->getNick().', do you have an oneechan?',
		'Do you have an oneechan, '.$this->ircClass->getNick().'?'
	),
	'replies'   => array(
		'Maybe~!'
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>