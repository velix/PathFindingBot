This is a dumb robot. It's placed in a maze and it has to reach a specific point to exit it. It tries to exit making random moves.

The maze is defined in a .txt file. The dots are empty tiles on which the robot can move, and the @s are walls.

Before every move, a direction is randomly generated. This move is then translated in a position on the maze, and if it's a valid position, the robot makes the move. 

That continues untill the end position is reached.