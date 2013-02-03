<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'pantsu color',
	'synonyms'  => array(
		$this->ircClass->getNick().', what color are your panties?',
		'What color are your panties, '.$this->ircClass->getNick().'?',
		$this->ircClass->getNick().', what color panties are you wearing?',
		'What color panties are you wearing, '.$this->ircClass->getNick().'?',
		$this->ircClass->getNick().', what color are your panties',
		'What color are your panties, '.$this->ircClass->getNick(),
		$this->ircClass->getNick().', what color panties are you wearing',
		'What color panties are you wearing, '.$this->ircClass->getNick(),
		$this->ircClass->getNick().', what colour are your panties?',
		'What colour are your panties, '.$this->ircClass->getNick().'?',
		$this->ircClass->getNick().', what colour panties are you wearing?',
		'What color panties are you wearing, '.$this->ircClass->getNick().'?',
		$this->ircClass->getNick().', what colour are your panties',
		'What colour are your panties, '.$this->ircClass->getNick(),
		$this->ircClass->getNick().', what colour panties are you wearing',
		'What colour panties are you wearing, '.$this->ircClass->getNick(),
	),
	'replies'   => array(
		"Blue... and white.",
		"Blue and white striped!",
		"Blue shimapan!"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>
