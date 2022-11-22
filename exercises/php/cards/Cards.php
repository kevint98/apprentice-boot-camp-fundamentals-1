<?php

namespace McrDigital\PhpFundamentals1\Cards;

class Cards
{
    public function getCards(): array
    {
        $result = [];
        $deck = new PlayingCardDeck();

        $cardNumber = 0;
        foreach ($deck->playingCards as $card) {


            $suitName = $card->getSuit();
            $result[] = strval($card);

            $cardNumber++;
        }

        return $result;
    }

}




$cards = new cards();
$deckInOrder = $cards->getCards();

foreach ($deckInOrder as $card) {
    echo $card . PHP_EOL;
}