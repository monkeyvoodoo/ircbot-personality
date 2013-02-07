<?php
$reply = array(
	"ACTION:blushes\nW- What are you doing?!",
	"ACTION:turns bright red\nWhere are you touching me?!",
	// "ACTION:blushes and promptly takes a seat on <nick>\n...\nACTION:jumps up\n...\nWhat's this ... sticky...",
	"Oniichan, that feels... funny!",
	"Don't tickle me- AHN!"
);
switch(strtolower($nick)) {
	case 'argon': array_push($reply, "ACTION:looks worried\nYou rub me too much!"); break;
	case 'monkey': $reply = array("<nick>, don't be dumb."); break;
}
?>