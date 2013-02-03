<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'boobies',
	'synonyms'  => array(
		$this->ircClass->getNick().', boobies!',
		'boobies, '.$this->ircClass->getNick().'!',
	),
	'replies'   => array(
		"Yaay! \o/",
		"Where?!",
		"ACTION:blushes\nI don't like that kind of thing!"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>