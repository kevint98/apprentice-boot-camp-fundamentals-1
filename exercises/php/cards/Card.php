<?php
namespace McrDigital\PhpFundamentals1\Cards;

interface Card {
    public function snap(Card $previousCard) : bool;

}

