<?php

class CCards
{
    public function getCards(): array
    {
        $result = [];
        $deck = [];

        foreach(Suit::$suits as $suit) {
            for ($faceValue = 0; $faceValue < 13; $faceValue++) {
            $card = new PlayingCard();
            $card->suit = $suit;
            $card->faceValue = $faceValue;
            $deck[] = $card;
            }
        }

        $cardNumber = 0;
        foreach ($deck as $card) {
            $faceValueName = "";
            switch ($card->faceValue) {
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
                    $faceValueName = strval($card->faceValue + 1);
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
                    throw new Exception("Something went wrong " . $card->faceValue . " is not a valid faceValue!");
            }

            $suitName = $card->suit;

            $result[$cardNumber] = $faceValueName . " of " . $suitName;
            $cardNumber++;
        }

        return $result;
    }

}

class PlayingCard {
    public string $suit;
    public int $faceValue;
}

class Suit {

    public static array $suits = array('clubs', 'diamonds', 'hearts', 'spades');

}




$cards = new CCards();
$deckInOrder = $cards->getCards();

foreach ($deckInOrder as $card) {
    echo $card . PHP_EOL;
}