<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'sit',
	'synonyms'  => array(
		$this->ircClass->getNick().', sit.',
		$this->ircClass->getNick().', sit',
		$this->ircClass->getNick().' sit.',
		$this->ircClass->getNick().' sit'
	),
	'replies'   => 'INCLUDE:./modules/personality/replies/fixed/sit-reply.php',
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>