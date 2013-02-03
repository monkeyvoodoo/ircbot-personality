<?php
$this->defaultReplies = array(
	'???',
	"I don't understand!",
	"I need a nap before I can respond to that."
);

require('./modules/personality/replies/keywords.php');

$paths = array(
	'./modules/personality/replies/actions',
	'./modules/personality/replies/fixed'
);

foreach($paths as $path) {
	$dh = dir($path);
	while(false !== ($entry = $dh->read())) {
		if(substr($entry, -4) == '.php') {
			require("{$path}/{$entry}");
			$this->addReply(
				$action['type'],
				$action['name'],
				$action['synonyms'],
				$action['replies'],
				$action['declines'],
				$action['friendly'],
				$action['points'],
				$action['threshold']
			);
		
		}
	}
}
?>