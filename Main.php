<?php

spl_autoload_register(function ($class_name) {
    $file = $class_name . '.php';
    if (file_exists($file)) {
        require($file);
    } else {
        throw new Exception("Unable to load $class_name.");
    }
});

$map_file = 'map.txt';
$map_loader = new MapLoader($map_file);
$map = $map_loader->getMap();

$map_loader->setStart([3,1]);
$map_loader->setEnd([3,8]);

$move = new MoveGenerator();

$robot = new Robot([3,1]);

// While the robot is not in the end position
while (!$map_loader->isEndPosition($robot->getCurrentPosition())) {
    print('Robot moving.');
    printf('Current position : %s, %s', $robot->getCurrentPosition()[0], $robot->getCurrentPosition()[1]);
    print('</br>');

//    Randomly pick a direction to move towards
    $new_move_directions = $move->generate();
//    Based on the randomly picked direction, find corresponding maze position
    $attempted_position = $robot->attemptMove($new_move_directions);

//    If the new position is valid (in maze limits, and not on maze wall) make the move
    if ($map_loader->isValidPosition($attempted_position)) {
        $robot->makeMove($attempted_position);
        printf('Making move : %s, %s', $attempted_position[0], $attempted_position[1]);
        print('</br>');
    } else {
        print('Caught non valid position');
        print('</br>');
    }

}

print('</br>');
printf('Robot stopped moving.');
printf('Final position : %s, %s\', $robot->getCurrentPosition()[0], $robot->getCurrentPosition()[1]');
print('</br>');