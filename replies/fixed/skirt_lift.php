<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'skirt_lift',
	'synonyms'  => array(
		$this->ircClass->getNick().', lift your skirt.',
		$this->ircClass->getNick().', lift your skirt!',
		$this->ircClass->getNick().', lift your skirt',
		$this->ircClass->getNick().' lift your skirt.',
		$this->ircClass->getNick().' lift your skirt!',
		$this->ircClass->getNick().' lift your skirt',
		$this->ircClass->getNick().', lift up your skirt.',
		$this->ircClass->getNick().', lift up your skirt!',
		$this->ircClass->getNick().', lift up your skirt',
		$this->ircClass->getNick().' lift up your skirt.',
		$this->ircClass->getNick().' lift up your skirt!',
		$this->ircClass->getNick().' lift up your skirt'
	),
	'replies'   => array(
		"No!\nACTION:waits until nobody's looking and lifts her skirt up anyways\nINCLUDE:./modules/personality/replies/fixed/skirt_lift-reply.php",
		"ACTION:glares at <nick>",
		"Just lift it yourself, you lech!"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>
