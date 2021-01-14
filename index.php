<?php

	define('PATH_PUBLIC', 'public/');
	define('PATH_CSS', PATH_PUBLIC . 'css/');
	define('PATH_SCRIPT', PATH_PUBLIC . 'scripts/');
	define('PATH_IMG', PATH_PUBLIC . 'images/');
	define('PATH_CARD', PATH_IMG . 'cards/');
	define('CARD_SIZE', '150');

	define("04178474", "Raigeki Break");
	define("08240199", "Sage With Eyes of Blue");
	define("10667321", "Ancient of Rules");
	define("38517737", "Blue-Eyes Alternative White Dragon");
	define("39701395", "Cards of Consonance");
	define("45467446", "Dragon Spirit of White");
	define("45644898", "Master With Eyes of Blue");
	define("48800175", "The Melody of Aweakening Dragon");
	define("71039903", "Stone of Ancient");
	define("71587526", "Karma Cut");
	define("89631139", "Blue-Eyes White Dragon");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>YGO Random Hand</title>
  <meta charset="utf-8">
  <link href="<?=PATH_CSS;?>bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

<?php

	class Deck {

		private $deckName;
		private $deckCards;

		public function __construct($deckName, $deckCards) {
			$this->deckName = $deckName;
			$this->deckCards = $deckCards;
		}

		public function displayRandomCards($manyCards) {
			$tempDeck = $this->deckCards;
			$resultStr = (string) null;
			$handCard = [];

			for ($i = 0; $i < $manyCards; $i++) {
				$tempDeckSize = sizeof($tempDeck);
				$randIndex = rand(0, ($tempDeckSize - 1));
				$handCard[] = $tempDeck[$randIndex];
				$resultStr .= "Card [" . ($i + 1) . "] : ". $tempDeck[$randIndex] . "<br/>";

				$cloneDeck = [];
				for ($j = 0; $j < $tempDeckSize; $j++) { if ($j != $randIndex) { $cloneDeck[] = $tempDeck[$j]; } }
				$tempDeck = $cloneDeck;
			}
			echo $resultStr;
			echo "<div class='container'>";
			echo "<div class='row'>";
			foreach ($handCard as $val) {
				echo "<div class='col'><img src='" . PATH_CARD . $val . ".jpg' class='rounded' style='width: " . CARD_SIZE . "px'/></div>";
			}
			echo "</div>";
			echo "</div><hr/>";
		}

	}

	$blueEyesDeck = new Deck(
		"Blue Eyes",
		[
			"71039903",
			"71039903",
			"71039903",
			"45467446",
			"08240199",
			"08240199",
			"08240199",
			"38517737",
			"89631139",
			"89631139",
			"89631139",
			"39701395",
			"39701395",
			"39701395",
			"48800175",
			"10667321",
			"10667321",
			"71587526",
			"71587526",
			"71587526"
		]
	);

	$maxRounds = 10;
	for ($i = 0; $i < $maxRounds; $i++) {
		echo "Round [" . ($i + 1) . "]<br/>";
		$blueEyesDeck->displayRandomCards(4);
		echo "<br/>";
	}

?>

<script src="<?=PATH_SCRIPT;?>popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="<?=PATH_SCRIPT;?>https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>