<?php

	define('PATH_PUBLIC', 'public/');
	define('PATH_CSS', PATH_PUBLIC . 'css/');
	define('PATH_SCRIPT', PATH_PUBLIC . 'scripts/');
	define('PATH_IMG', PATH_PUBLIC . 'images/');
	define('PATH_CARD', PATH_IMG . 'cards/');
	define('DECK_IMGSIZE', '50');
	define('CARD_IMGWIDTH', '150');
	define('CARD_IMGHEIGHT', '218');

	define('CARD_START', 5);
	define('CARD_MAXRAND', 10);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>YGO Random Hand</title>
  <meta charset="utf-8">
  <link href="<?=PATH_CSS;?>bootstrap.min.css" rel="stylesheet">
  <link href="<?=PATH_CSS;?>mystyle.css" rel="stylesheet">
</head>
<body>

<?php

	require 'class.php';

	$deck = new Deck([
			"89631139",
			"89631139",
			"55878039",
			"55878039",
			"45467446",
			"85679527",
			"84290642",
			"84290642",
			"84290642",
			"71039903",
			"71039903",
			"71039903",
			"79814787",
			"8240199",
			"8240199",
			"8240199",
			"39701395",
			"39701395",
			"39701395",
			"48800175"
	]);

	$deck->displayDeck();
	$deck->displayRandomHand();

?>

<script src="<?=PATH_SCRIPT;?>popper.min.js"></script>
<script src="<?=PATH_SCRIPT;?>bootstrap.min.js"></script>
</body>
</html>