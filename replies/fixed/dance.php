<?php
$action = array(
	'type'      => 'fixed',
	'name'      => 'dance',
	'synonyms'  => array(
		$this->botNick.', dance!',
		$this->botNick.', dance.',
		$this->botNick.', dance',
		$this->botNick.' dance!',
		$this->botNick.' dance.',
		$this->botNick.' dance',
		'Dance, '.$this->botNick.'!',
		'Dance, '.$this->botNick.'.',
		'Dance, '.$this->botNick,
		'Dance '.$this->botNick.'!',
		'Dance '.$this->botNick.'.',
		'Dance '.$this->botNick,
	),
	'replies'   => array(
		"ACTION:twirls around\nLike this?",
		"ACTION:shakes her hips clumsily\nLike this?"
	),
	'declines'  => array(),
	'friendly'  => false,
	'points'    => 1,
	'threshold' => 0
);
?>