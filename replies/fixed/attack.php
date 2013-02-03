<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'attack',
	'synonyms'  => array(
		$this->botNick.', attack!',
		$this->botNick.', attack.',
		$this->botNick.', attack'
	),
	'replies'   => array(
		"ACTION:performs her transform sequence\nM-Magic UNLEASH!~!\nACTION:glomps <randomnick>",
		"ACTION:obliterates <randomnick>",
		"ACTION:yawns\nNot right now, I'm tired!"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>