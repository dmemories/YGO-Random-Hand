<?php

	class Deck {

		private $deckCards;

		public function __construct($deckCards) {
			$this->deckCards = $deckCards;
		}

		public function displayDeck() {
			$maxEachRow = 8;

			$resultStr = "<div class='container'><div class='row'>";
			$count = 0;
			for ($i = 0; $i < sizeof($this->deckCards); $i++) {
				if (($count++) == $maxEachRow) {
					$count = 1;
					$resultStr .= "</div><div class='row'>";
				}
				$resultStr .= "<div class='col-md-1 nopadding'><img src='" . PATH_CARD . $this->deckCards[$i] . ".jpg' class='rounded' style='width: " . DECK_IMGSIZE . "px'/></div>";
			}
			echo $resultStr . "</div></div><hr/>";
		}

        public function displayRandomHand(){
            for ($i = 0; $i < CARD_MAXRAND; $i++) {
                echo "Round [" . ($i + 1) . "]<br/>";
                $this->displayRandomCards(CARD_START);
                echo "<br/>";
            }
        }

		private function displayRandomCards($manyCards) {
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
				echo "<div class='col'><div class='sleeves' style='width: " . (CARD_IMGWIDTH + 10) . "px; height: ". (CARD_IMGHEIGHT + 10) ."px'><img src='" . PATH_CARD . $val . ".jpg' class='mycard' style='width: " . CARD_IMGWIDTH . "px; height: " . CARD_IMGHEIGHT . "px;' onclick=\"window.open('https://db.ygoprodeck.com/card/?search=". $val ."');\"/></div></div>";
			}
			echo "</div>";
			echo "</div><hr/>";
		}

	}

	/**/

?>