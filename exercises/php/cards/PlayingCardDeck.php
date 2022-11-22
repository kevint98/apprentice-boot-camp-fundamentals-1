<?php
namespace McrDigital\PhpFundamentals1\Cards;

class PlayingCardDeck extends Deck {

    public function __construct(){
        foreach(Suit::$suits as $suit) {
            for ($faceValue = 0; $faceValue < 13; $faceValue++) {
                $card = new PlayingCard($suit, $faceValue);
                $this->cards[] = $card;
            }
        }
    }

}