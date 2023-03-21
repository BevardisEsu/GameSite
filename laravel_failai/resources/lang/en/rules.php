<?php

return [

    'snake'=>"Rules:
The objective of the game is to control a snake and eat as many food items as possible without colliding with the walls or the snake's own tail.
Each time the snake eats a food item, its length increases by one unit and the player earns points.
The game ends when the snake collides with a wall or its own tail.
Controls:

The snake can be controlled using the arrow keys on the keyboard (up, down, left, and right).
The snake moves continuously in the direction it is facing until the player changes its direction using the arrow keys.
If the player presses the arrow key in the opposite direction of the snake's current direction, the snake will immediately collide with its own tail and the game will end.",

'sudoku'=>"Each cell in the grid must contain a single digit from 1 to 9.
Each row of the grid must contain all digits from 1 to 9 exactly once.
Each column of the grid must contain all digits from 1 to 9 exactly once.
Each region of the grid must contain all digits from 1 to 9 exactly once.
To solve a Sudoku puzzle, you need to fill in the grid so that all of these
rules are satisfied. The puzzle usually starts with some cells already filled
in, and your job is to use logic and deduction to figure out the values of the
 remaining cells. The difficulty of a Sudoku puzzle depends on the number of
  cells that are filled in at the start and the level of logic required to deduce
   the values of the remaining cells.",

    'wordle'=>"There is a 5 letter secret word that you need to guess it, rules
    are simple, after you submit word, tiles colors will change:
    Grey: Letter is not in final word
    Yellow: Letter is in final word, but it's not in correct order
    Green: Letter is in final word and is in correct order.
    After you complete the word, you will be rewarded with 10 points"
];
