<?php
$reply = array(
	"I can't drink that!",
	"Ewww, beer tastes gross!",
	"ACTION:takes a sip\n...\nThat was disgusting, <nick>!"
);
switch(strtolower($nick)) {
	case 's0lid':
	case 's0liddi':
		array_push($reply, "ACTION:grins\nAre we going in the sauna later? :D");
		array_push($reply, "I'll take two!\n...And a mooseburger!");
	break;
	case 'monkey': $reply = array("<nick>, don't be dumb."); break;
}
?>