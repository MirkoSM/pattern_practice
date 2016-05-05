<?php

namespace Patterns\Behavioral\Mediator;

class Hand extends BodyPart {
    private $hand;

    public function __construct ($hand, $brain) {
        $this->hand = $hand;
        parent::__construct($brain);
    }

    public function takeMyHand () {
        echo "<p>" . "Hand: I'm take your hand" . "</p>";
    }

    public function hit () {
        echo "<p>" . "Hand: APPERCOT!!!" . "</p>";
    }
}