<?php
namespace McrDigital\PhpFundamentals1\Cards;

class Deck{
    protected array $cards = array();

    public function shuffle() : void {
        for ($i = 0; $i < count($this->cards); ++$i) {
            $indexA = rand(0, $i);
            $indexB = $i;

            $valueA = $this->cards[$indexA];
            $valueB = $this->cards[$indexB];

            $this->cards[$indexA] = $valueB;
            $this->cards[$indexB] = $valueA;
        }
    }

    public function getCards() : array {
        $cardsAsStrings = [];
        foreach ($this->cards as $card) {
            $cardName = strval($card);
            $cardsAsStrings[] = $cardName;
        }
        return $cardsAsStrings;
    }

    public function deal() : Card {
        $card = array_splice($this->cards, 0, 1)[0];
        return $card;
    }
}