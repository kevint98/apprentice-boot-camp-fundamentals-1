<?php

/*
 * To execute this PHP script, use the command `php Snap.php`
 * from the command line positioned at the `cards/` directory.
 * E.g. cd cards/ && php Snap.php
 */


use McrDigital\PhpFundamentals1\Cards\AnimalDeck;
use McrDigital\PhpFundamentals1\Cards\PlayingCardDeck;
use McrDigital\PhpFundamentals1\Cards\Deck;
use McrDigital\PhpFundamentals1\Cards\MixedDeck;

require_once '../vendor/autoload.php';

class CSnap
{
    private int $player1Score;
    private int $player2Score;
    private Deck $deck;

    public function __construct(Deck $deck)
    {
        $this->player1Score = 0;
        $this->player2Score = 0;
        $this->deck = $deck;
        $this->deck->shuffle();
    }


    public function play(): void
    {
        $previousCard = null;

        while (count($this->deck->getCards()) > 0) {
            $currentCard = $this->deck->deal();

            echo $currentCard . PHP_EOL;

            $prompt = readline("Play snap: ");

            if (strlen($prompt) > 0 && strtolower(substr($prompt, 0)) === 'a') {
                if ($currentCard->snap($previousCard)) {
                    echo "SNAP! score Player 1" . PHP_EOL;
                    $this->player1Score++;
                } else {
                    echo "WRONG! deducting score from Player 1" . PHP_EOL;
                    $this->player1Score--;
                }
            } else if (strlen($prompt) > 0 && strtolower(substr($prompt, 0)) === 'l') {
                if ($currentCard->snap($previousCard)) {
                    echo "SNAP! score Player 2" . PHP_EOL;
                    $this->player2Score++;
                } else {
                    echo "WRONG! deducting score from Player 2" . PHP_EOL;
                    $this->player2Score--;
                }
            }

            $previousCard = $currentCard;
        }

        if ($this->player1Score === $this->player2Score) {
            echo "Draw..." . PHP_EOL;
        } else if ($this->player1Score > $this->player2Score) {
            echo "Player 1 wins!" . PHP_EOL;
        } else {
            echo "Player 2 wins!" . PHP_EOL;
        }

        echo "Scores: " . $this->player1Score . " vs " . $this->player2Score . PHP_EOL;
    }
}

$snap = new CSnap(new MixedDeck(new AnimalDeck(), new PlayingCardDeck()));
$snap->play();

