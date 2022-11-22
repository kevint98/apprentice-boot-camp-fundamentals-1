<?php
namespace McrDigital\PhpFundamentals1\Cards;

abstract class Card {
    public abstract function snap(Card $previousCard) : bool;

}

