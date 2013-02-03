<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'get_over_here',
	'synonyms'  => array(
		$this->botNick.', get over here',
		$this->botNick.', get over here!',
		$this->botNick.', get over here.',
		$this->botNick.'! get over here',
		$this->botNick.'! get over here!',
		$this->botNick.'! get over here.',
	),
	'replies'   => array(
		"ACTION:skips over to <nick>\nYes?",
		"ACTION:eyes <nick> suspiciously\nYou better not rub me again!",
		"Yay!\nACTION:runs over to <nick>\nWhat are we gonna do today?"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>
