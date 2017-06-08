<?php

class MoveGenerator {
    private $map;

    private $moves = array(
        array(-1, 0), // left
        array(-1, 1), //diagonally upwards left
        array(0, 1), //down
        array(0, -1), //up
        array(1, 1), //diagonally downwards right
        array(1, 0), //etc
        array(1, -1),
        array(-1, -1)
    );
    public function __construct()
    {
    }

    public function generate() {
        $random_move_choice = rand(0,7);
        $move_choice = $this->moves[$random_move_choice];

        return $move_choice;
    }
}