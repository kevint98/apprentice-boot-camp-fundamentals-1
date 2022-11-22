<?php
namespace McrDigital\PhpFundamentals1\Cards;

abstract class Deck{

    public abstract function shuffle() : void;

    public abstract function getCards() : array;

    public abstract function deal() : Card;
}