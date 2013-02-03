<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'pantsu type',
	'synonyms'  => array(
		$this->ircClass->getNick().', what do your panties look like?',
		$this->ircClass->getNick().', what type of panties are you wearing?',
		$this->ircClass->getNick().', what kind of panties are you wearing?',
		'What do your panties look like, '.$this->ircClass->getNick().'?',
		'What type of panties are you wearing, '.$this->ircClass->getNick().'?'
	),
	'replies'   => array(
		'None!',
		"The stripey kind, with blue and white!",
		"Shimashima~"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>