<?php
namespace McrDigital\PhpFundamentals1\Cards;

interface Deck{

    public function shuffle() : void;
    public function getCards() : array;
    public function deal() : Card;
}