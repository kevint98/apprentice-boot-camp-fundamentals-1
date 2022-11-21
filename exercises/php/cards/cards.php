<?php

class CCards
{
    public function getCards(): array
    {
        $result = [];
        $deck = new PlayingCardDeck();

        $cardNumber = 0;
        foreach ($deck->playingCards as $card) {
            $faceValueName = "";
            switch ($card->getFaceValue()) {
                case 0:
                    $faceValueName = 'ace';
                    break;
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                case 8:
                case 9:
                    $faceValueName = strval($card->getFaceValue() + 1);
                    break;
                case 10:
                    $faceValueName = "jack";
                    break;
                case 11:
                    $faceValueName = "queen";
                    break;
                case 12:
                    $faceValueName = "king";
                    break;
                default:
                    throw new Exception("Something went wrong " . $card->getFaceValue() . " is not a valid faceValue!");
            }

            $suitName = $card->getSuit();

            $result[$cardNumber] = $faceValueName . " of " . $suitName;
            $cardNumber++;
        }

        return $result;
    }

}

class PlayingCard {

    private string $suit;
    private int $faceValue;

    public function __construct(string $suit, int $faceValue) {
            $this->suit = $suit;
            $this->faceValue = $faceValue;
        }

    public function getSuit(): string {
            return $this->suit;
        }

    public function getFaceValue(): int {
        return $this->faceValue;
    }
}

class Suit {

    public static array $suits = array('clubs', 'diamonds', 'hearts', 'spades');

}

class PlayingCardDeck {
    public array $playingCards = array();

    public function __construct(){
        foreach(Suit::$suits as $suit) {
                    for ($faceValue = 0; $faceValue < 13; $faceValue++) {
                    $card = new PlayingCard($suit, $faceValue);
                    $this->playingCards[] = $card;
                    }
                }
    }


}


$cards = new CCards();
$deckInOrder = $cards->getCards();

foreach ($deckInOrder as $card) {
    echo $card . PHP_EOL;
}