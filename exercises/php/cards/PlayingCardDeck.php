<?php
namespace McrDigital\PhpFundamentals1\Cards;

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