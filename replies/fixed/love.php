<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'love',
	'synonyms'  => array(
		$this->ircClass->getNick().', do you love me?',
		$this->ircClass->getNick().', do you love me',
		$this->ircClass->getNick().' do you love me?',
		$this->ircClass->getNick().' do you love me',
	),
	'replies'   => 'INCLUDE:./modules/personality/replies/fixed/love-reply.php',
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>
