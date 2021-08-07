<?php

namespace app\models\tictactoe;

use Exception;

class TicTacToeModel
{
    public function getMove(array $grid, string $mark): string
    {

        $player = new Player('Robot', false);
        $player->setMark($mark);
        $board = new Board(count($grid));
        $board->setGrid($grid);

        return $player->move($board);
    }
}