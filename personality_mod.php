<?php
class personality_mod extends module {

	public $title = "Personality Module";
	public $author = "Ethan Clark";
	public $version = "1.1";
	public $revision = "2013.2.3.1";

	private $i = null;
	private $pDb = null;
	private $messageStack = array();
	private $annoyed = array();
	private $defaultReplies = array();
	private $replies = array();
	private $keywords = array();
	private $keywordReplies = array();
	private $fromNick = '';
	private $fromNickFormatted = '';
	private $botNick = '';
	private $adminNicks = array();
	private $greets = array();
	private $hidden = false;
	private $hideTime = 0;
	private $hideDuration = 0;
	private $hideResponse = '';
	private $hideReturn = '';
	private $joinGreet = false;
	private $greetTimeout = 240; // minutes
	private $greetAbsent  = 2880; // minutes
	private $greetList = array();
	private $lastSpoke = 0;
	private $idleTimeout = 0; // minutes
	private $idleTimeoutMin = 90; // minutes
	private $idleTimeoutMax = 150; // minutes
	private $idleCheckInterval = 1; // minutes
	private $idles = array();
	private $typingSpeed = 6; // characters per second that the bot can "type". used for delaying outbound messages
	private $urlsReply = null;

	public function init()
	{
		$this->i = $this->ircClass;
		$this->reload();
		$this->ircClass->log("Personality: ".count($this->replies)." replies loaded.");
		// $this->ircClass->log(print_r($this->replies, true));

/*
		try {
			$this->pDb = new PDO("pgsql:host=localhost dbname=bot user=bot password=<password here>"); // FIXME Hardcoded database connection lol
		} catch(PDOException $e) {
			$this->ircClass->log("Database connection failed: {$e->getMessage()}");
			exit;
		}
		$this->ircClass->log("Personality module connected to database successfully.");
*/

		$this->botNick = irc::myStrToLower($this->ircClass->getNick());

		$this->timerClass->addTimer("idle", $this, "idle", null, ($this->idleCheckInterval * 60), false);
		$this->lastSpoke = time();
		$this->randomizeIdleTimer();

		$this->timerClass->addTimer('speakTimer', $this, "sendReply", null, 1, true);
	}

	public function personality($line, $args) {
		global $urlsReply;

		$args['cmd'] = trim($args['cmd'], chr(1));
		$fromNick = irc::myStrToLower($line['fromNick']);
		$this->fromNick = $fromNick;
		$this->fromNickFormatted = $line['fromNick'];
		$myNick   = irc::myStrToLower($this->ircClass->getNick());

		// $this->ircClass->log(print_r(array($line, $args), true));

		if($fromNick != $myNick) { // bot didn't say this
			// $this->ircClass->log(print_r(array($myNick, $line, $args), true));

			$theText = irc::myStrToLower(trim($line['text'], chr(1)));

			// check for simple, one-word actions
			if(false !== strpos($args['query'], 'http://') || false !== strpos($args['query'], 'http://')) {
				$reply = $urlsReply($line, $args);
				$this->queueReply($line['to'], $reply);
			} elseif($args['cmd'] == 'action' && false !== strpos(irc::myStrToLower($args['query']), $myNick)) {
				$theWord = irc::myStrToLower($args['query']);
				if(false !== ($pos = strpos($theWord, $this->botNick))) $theWord = trim(strtr($theWord, array($this->botNick => '')), ',!?-_:; '.chr(1));
				// $this->ircClass->log(print_r(array($theWord, $args), true));
				$reply = "I don't understand what you just did!";
				foreach($this->replies['action'] as $action) {
					$synonyms = array();
					foreach($action['synonyms'] as $synonym) array_push($synonyms, irc::myStrToLower($synonym));

					// $this->log(print_r(array($theWord, $synonyms), true));

					if(in_array($theWord, $synonyms)) {
						$reply = $this->getReply($action['replies']);
						break;
					}
				}
				$this->queueReply($line['to'], $reply);
				return(true);
			} elseif(false !== strpos(irc::myStrToLower($line['text']), $myNick)) { // fixed replies
				switch($theText) { // commands
					case $myNick.', reload':
					case $myNick.', reload verbose':
						if(!in_array($fromNick, $this->adminNicks)) {
							$this->queueReply($line['to'], "I don't have to do what you tell me! >:3");
						} else {
							$this->queueReply($line['to'], "Haaai!");
							$this->reload();
							$keywordCount = 0;
							foreach($this->keywords as $keywordKey => $keywordList) {
								$keywordCount += count($keywordList);
							}
							$defaultReplyCount = count($this->defaultReplies);
							$replyCount = 0;
							foreach($this->replies as $replyType => $replyList) {
								$replyCount += count($replyList);
							}
							if(false !== strpos($theText, 'verbose')) $this->queueReply($line['to'], "I found {$keywordCount} keywords, {$replyCount} replies, and {$defaultReplyCount} default replies!");
						}
						return(true);
					break;
					case $myNick.', shut up':
					case $myNick.' shut up':
						if(!in_array($fromNick, $this->adminNicks)) {
							$this->queueReply($line['to'], "Who are you? I was told to greet people!");
						} else {
							$this->queueReply($line['to'], "Haaai!");
							$this->joinGreet = false;
						}
					break;
					case $myNick.', be friendly':
					case $myNick.' be friendly':
					case $myNick.', you can talk':
					case $myNick.' you can talk':
						if(!in_array($fromNick, $this->adminNicks)) {
							$this->queueReply($line['to'], "Nope!");
						} else {
							$this->queueReply($line['to'], "Haaai!");
							$this->joinGreet = true;
						}
					break;
				}

				// $this->ircClass->log(print_r($this->replies, true));

				$reply = null;
				foreach($this->replies['fixed'] as $item) {
					if(in_array($theText, $item['synonyms'])) {
						$reply = $this->getReply($item['replies']);
						break;
					}
				}
				if(!is_null($reply)) {
					$this->queueReply($line['to'], $reply);
					return(true);
				}
			}

			// keyword replies
			$theText = irc::myStrToLower(trim($line['text'], chr(1)));
			$theWords = explode(' ', $theText);
			foreach($theWords as $word) {
				$word = strtr($word, array(',' => '', '.' => '', '"' => '', "'" => '', '?' => '', '!' => ''));
				foreach($this->keywords as $wordKey => $matchList) {
					if(in_array($word, $matchList)) {
						if(isset($this->keywordReplies[$wordKey])) {
							$reply = $this->getReply($this->keywordReplies[$wordKey]);
							$this->queueReply($line['to'], $reply);
						} else {
							$this->queueReply($line['to'], "Someone forgot to add a reply for the keyword '{$word}'!");
						}
						return(true);
					}
				}
			}

			// FIXME more complex actions
		}
	}

	public function hide($channel, $duration, $response, $return) {
		$this->log("Hiding from {$channel} for {$duration} seconds");
		$this->hidden       = true;
		$this->hideTime     = time();
		$this->hideChannel  = $channel;
		$this->hideDuration = $duration;
		$this->hideResponse = $response;
		$this->hideReturn   = $return;
		$this->timerClass->addTimer('unHide', $this, "unHide", null, $duration, false);
	}

	public function unHide() {
		$this->hidden = false;
		$this->queueReply($this->hideChannel, $this->hideReturn);
		$this->log("Done hiding");
		return(false); // destroy the timer, since we're done with it now
	}

	public function getRandomChannel() {
		$channels = $this->i->getChannelNames();
		return($channels[$this->rand(0, count($channels) - 1)]);
	}

	public function getRandomUser($channel) {
		$users = $this->i->getChannelUsers($channel);
		return($users[$this->rand(0, count($users) - 1)]);
	}

	private function randomizeIdleTimer() {
		$this->idleTimeout = $this->rand($this->idleTimeoutMin, $this->idleTimeoutMax);
	}

	public function idle() {
		// $this->log("Idle check: last spoke ".date('Y-m-d H:i:s', $this->lastSpoke).' ('.(time() - $this->lastSpoke).' seconds ago)');
		$timeSinceLastIdle = (time() - $this->lastSpoke) / 60;
		if($timeSinceLastIdle >= $this->idleTimeout) {
			if($this->rand(0,1) == 1) {
				$idleTypes = array_keys($this->idles);
				$idleType = $idleTypes[$this->rand(0, count($idleTypes) - 1)];

				$channel = $this->getRandomChannel();
				$allNicks = $this->i->getChannelUsers($channel);
				$nick    = $this->getRandomUser($channel);
				do {
					$nick2 = $this->getRandomUser($channel);
					// $this->log(array('nick' => $nick, 'nick2' => $nick2));
				} while(count($allNicks) > 1 && $nick == $nick2);
				$message = strtr($this->randomItem(
					$this->idles[$idleType]), array(
						'<nick>' => $nick,
						'<nick2>' => $nick2,
						'<randomnick>' => $this->getRandomUser($this->getRandomChannel()),
						'<randomnick2>' => $this->getRandomUser($this->getRandomChannel())
						)
				);

				$this->queueReply($channel, $message);
			} else {
				$waitLength = $this->idleTimeout - ($this->idleTimeout / $this->rand(1, 6));
				$this->lastSpoke = time() - $waitLength;
			}
		}

		$this->randomizeIdleTimer();
		return(true);
	}

	public function join($line, $args) {
		$channel = trim($line['to'], ':'.chr(1));
		$nick    = $line['fromNick'];
		$timeSinceLastGreet = 0;

		$remReplies = array(
			"Rem! \\o/\nMonkey said I'm supposed to show you this!\nACTION:lifts her skirt",
			"ACTION:bends over for Rem\nYou can draw me now!",
			"ACTION:attacks Rem, handing him a cat tail buttplug\nMonkey said you'd show me how to use this!",
			"Rem, Rem!\nACTION:makes a superhero pose\nI'm ready!",
			"If I dress like Shinobu, will you draw me, Rem?",
			"ACTION:bites Rem\nThere's more where that came from! >:3",
			"RRREMMMMMMMM!\nACTION:grabs her panties with both hands and yanks upward with all her might\nWHYYYYYYYYYYYYYYYYYYYYYY WON'T YOU DRAWWWWWWWWWWW!",
			"ACTION:sighs and sits on Rem"
		);
		$mujiReplies = array(
			"Muji!\nWhere is Rem? He's supposed to draw me!"
		);

		if($this->joinGreet && irc::myStrToLower($nick) != irc::myStrToLower($this->botNick)) {
			if(irc::myStrToLower($nick) == 'rem') $this->queueReply($channel, $this->getReply($remReplies, $nick));
			if(irc::myStrToLower($nick) == 'muji') $this->queueReply($channel, $this->getReply($mujiReplies, $nick));
/*
			$qry = $this->pDb->prepare("SELECT * FROM v1_greet WHERE LOWER(nick) = LOWER(:nick)");
			$qry->execute(array(':nick' => $nick));
			$rows = $qry->fetchAll(PDO::FETCH_ASSOC);

			$greet = false;
			// $this->log($rows);
			if(count($rows) > 0) {
				$lastGreet = $rows[0];
				$lastGreet = strtotime($lastGreet['greeted']);
				$timeSinceLastGreet = time() - $lastGreet;
				if(time() - $lastGreet > $this->greetTimeout) $greet = true;
			} else {
				$qry = $this->pDb->prepare("INSERT INTO v1_greet ( nick ) VALUES ( :nick )");
				$qry->execute(array(':nick' => $nick));
				$greet = true;
			}

			if($greet && irc::myStrToLower($nick) != $this->botNick) {
				if($timeSinceLastGreet >= $this->greetAbsent) $greetType = 'absent';
				else $greetType = 'standard';

				// $this->log(array($channel, $this->greets));
				$message = $this->getReply($this->greets[$greetType], $nick);
				$this->queueReply($channel, $message);
				$qry = $this->pDb->prepare("UPDATE v1_greet SET greeted = LOCALTIMESTAMP WHERE LOWER(nick) = LOWER(:nick)");
				$qry->execute(array(':nick' => $nick));
			}
*/
		}
	}

	public function addReply($type, $name, $synonyms, $replies, $declines, $requireFriend, $pointAward, $pointThreshold) {
		// synonyms and replies should be numeric arrays

		foreach($synonyms as $key => $val) $synonyms[$key] = strtolower($val);

		if(!isset($this->replies[$type][$name])) {
			$this->replies[$type][$name] = array(
				'name'      => $name,
				'synonyms'  => $synonyms,
				'replies'   => $replies,
				'declines'  => $declines,
				'friendly'  => $requireFriend,
				'points'    => $pointAward,
				'threshold' => $pointThreshold
			);
		} else {
			$r = &$this->replies[$type][$name];
			foreach($synonyms as $synonym) array_push($r['synonyms'], $synonym);
			foreach($replies as $reply) array_push($r['replies'], $reply);
			foreach($declines as $decline) array_push($r['declines'], $decline);
		}
	}

	public function reload() {
		$this->replies = array();
		try {
			require('./modules/personality/urls.php');
			require('./modules/personality/replies.php');
			require('./modules/personality/greets.php');
			$this->greets = $greets;
			require('./modules/personality/admins.php');
			$this->adminNicks = $admins;
			require('./modules/personality/idles.php');
			$this->idles = $idles;
			require('./modules/personality/do_not_bother.php');
			$this->annoyed = $annoyed;
		} catch(error $e) {
			$this->ircClass->log($e);
		}
	}

	public function randomItem($input) {
		if(is_array($input) && count($input) == 0) return($input);
		elseif(is_array($input) && count($input) == 1) return($input[0]);
		else {
			$index = $this->rand(0, count($input) - 1);
			return($input[$index]);
		}
	}

	public function getReply($reply, $nick = null) {
		if(is_null($nick)) $nick = $this->fromNickFormatted;

		if(!is_array($reply)) {
			if(strtolower(substr($reply, 0, 8)) == 'include:') {
				$includeFile = substr($reply, 8);
				$this->log("include()'ing file: ".getcwd()."/{$includeFile}");
				include(getcwd()."/".$includeFile);
			} else $reply = array($reply);
		}

		return(
			strtr(
				$this->randomItem($reply),
				array(
					'<nick>' => $nick,
					'<NICK>' => strtoupper($nick),
					'<randomnick>' => $this->getRandomUser($this->getRandomChannel()),
					'<randomnick2>' => $this->getRandomUser($this->getRandomChannel())
				)
			)
		);
	}

	private function queueReply($to, $message) {
		if($this->hidden) $message = $this->hideResponse;

		$messages = explode("\n", $message);
		foreach($messages as $line) {
			// check for a "hide"
			if(strtolower(substr($line, 0, 5)) == 'hide:') {
				$this->log($line);
				$line = substr($line, 5);
				$hide = explode('|', strtr($line, array('\n' => "\n")));
				$this->log("Hiding for {$hide[0]} seconds");
				$this->hide($to, $hide[0], $hide[1], $hide[2]);
			} else {
				if(strtolower(substr($line, 0, 8)) == 'include:') {
					$includeFile = substr($line, 8);
					$this->log("include()'ing file: {$includeFile}");
					include($includeFile);
					$line = $this->randomItem($reply);
				}

				$lineLength = strlen(strtr($line, array('ACTION:' => '')));
				if($lineLength == 0) $lineLength = 1;
				$delay = $lineLength / $this->typingSpeed;

				// $this->log($line);
				// $this->log("Delaying response {$delay} seconds");
				$timerKey = microtime(true).mt_rand(1000,9999);
				if(count($this->messageStack) == 0) $this->lastSpoke = time();
				array_push($this->messageStack, array('to' => $to, 'message' => $line, 'delay' => $delay));
			}
		}
	}

	public function sendReply() {
		if(count($this->messageStack) > 0) {
			$now = time();
			$lastReply = $now - $this->lastSpoke;
			// $this->log("Last reply was {$lastReply} seconds ago");
			if($lastReply >= $this->messageStack[0]['delay']) {
				$args = array_shift($this->messageStack);
				$to = $args['to'];
				$line = $args['message'];

				if(strtolower(substr($line, 0, 7)) == 'action:') $this->ircClass->action($to, substr($line, 7));
				elseif(substr($line, 0, 4) == 'EXIT') exit;
				else $this->ircClass->privMsg($to, $line);

				$this->lastSpoke = time();
			}
		}

		return(true);
	}

	public function destroy()
	{
		// Put code here to destroy the timers that you created in init()
		// and whatever else cleanup code you want.
	}

	private function log($data) {
	    if(is_array($data) || is_object($data)) $data = print_r($data, true);
	    $this->i->log($data);
	}

	private function rand($min, $max) {
		return(mt_rand($min, $max));
	}

	//Methods here:
}
?>