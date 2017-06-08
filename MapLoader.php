<?php


class MapLoader {
    private $map_file_location;
    private $map;

    private $rows;
    private $columns;

    private $start;
    private $end;

    private $wall_tile = '@';
    private $empty_tile = '.';

    public function __construct($file_location)
    {
        $this->map_file_location = $file_location;

//        Reads the file into an array, does not add new line characters
        $map_file = file($this->map_file_location, $flags = FILE_IGNORE_NEW_LINES);

        $this->map = [];
        foreach ($map_file as $row) {
            $row_array = str_split($row);
            array_push($this->map, $row_array);
        }

        $this->rows = count($this->map);
        $this->columns = count($this->map[0]);
    }

    public function getMap() {
        return $this->map;
    }

    public function inMap($position) {
        $row = $position[0];
        $column = $position[1];
        return $row <= $this->rows && $column <= $this->columns;
    }

    public function setStart($position) {
        if ($this->inMap($position)) {
            $this->start = $position;
        } else {
            throw new Exception("Start position outside map limits");
        }

    }

    public function getStart()
    {
        return $this->start;
    }

    public function setEnd($position) {
        if ($this->inMap($position)) {
            $this->end = $position;
        } else {
            throw new Exception("End position outside map limits");
        }
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function isEndPosition($position) {
        return $this->getEnd()[0] == $position[0] && $this->getEnd()[1] == $position[1];
    }

    private function getTile($position) {
        return $this->map[$position[0]][$position[1]];
    }

    public function isValidPosition($position) {
        if ( $this->inMap($position) & ($this->getTile($position) == $this->empty_tile) ) return true;
        return false;
    }
}