<?php
namespace McrDigital\PhpFundamentals1\Cards;

class PlayingCardDeck extends Deck {
    public array $playingCards = array();

    public function __construct(){
        foreach(Suit::$suits as $suit) {
            for ($faceValue = 0; $faceValue < 13; $faceValue++) {
                $card = new PlayingCard($suit, $faceValue);
                $this->playingCards[] = $card;
            }
        }
    }


    public function shuffle(): void
    {
        for ($i = 0; $i < count($this->playingCards); ++$i) {
            $indexA = rand(0, $i);
            $indexB = $i;

            $valueA = $this->playingCards[$indexA];
            $valueB = $this->playingCards[$indexB];

            $this->playingCards[$indexA] = $valueB;
            $this->playingCards[$indexB] = $valueA;
        }
    }

    public function getCards(): array
    {
        $cards = [];
        foreach ($this->playingCards as $card) {
            $cardName = strval($card);
            $cards[] = $cardName;
        }
        return $cards;
    }

    public function deal(): Card
    {
        $card = array_splice($this->playingCards, 0, 1)[0];
        return $card;
    }
}