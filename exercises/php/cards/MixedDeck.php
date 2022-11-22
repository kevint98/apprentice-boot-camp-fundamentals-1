<?php
namespace McrDigital\PhpFundamentals1\Cards;

class MixedDeck extends Deck {

    public function __construct(AnimalDeck $animalDeck, PlayingCardDeck $playingCardDeck ) {

        while(count($animalDeck->getCards()) > 0 ) {
            $currentCard = $animalDeck->deal();
            $this->cards[] = $currentCard;
        }

        while(count($playingCardDeck->getCards()) > 0 ) {
            $currentCard = $playingCardDeck->deal();
            $this->cards[] = $currentCard;
        }
    }
}