<?php


class Robot {
    private $starting_position;
    private $current_position;

    public function __construct($position)
    {
        $this->starting_position = $position;
        $this->current_position = $this->starting_position;
    }

    public function attemptMove($directions) {
        $current_row = $this->current_position[0];
        $current_column = $this->current_position[1];

        $new_row = $current_row + $directions[0];
        $new_column = $current_column + $directions[1];

        $attempted_move = array($new_row, $new_column);

        return $attempted_move;
    }


    public function makeMove($attempted_position) {
        $this->current_position = $attempted_position;
    }

    public function getCurrentPosition() {
        return $this->current_position;
    }
}