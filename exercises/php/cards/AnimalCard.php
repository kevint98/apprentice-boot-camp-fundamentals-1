<?php

namespace McrDigital\PhpFundamentals1\Cards;

class AnimalCard extends Card
{
    private string $animal;

    public function __construct(string $animal)
    {
        $this->animal = $animal;
    }

    public function __toString(): string
    {
        return $this->animal;
    }

    public function snap(Card | null $card): bool
    {
        return $card instanceof AnimalCard && $this->animal === $card->animal;
    }

}