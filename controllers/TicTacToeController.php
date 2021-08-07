<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\tictactoe\Board;
use app\models\tictactoe\Player;
use app\models\tictactoe\TicTacToeModel;

class TicTacToeController extends Controller
{

    public function init()
    {
        return $this->render('TicTacToe');
    }

    public function getMinMaxMove(Request $request)
    {
        $data = $request->getBody();
        $board = $data['board'];
        $mark = $data['mark'];

        $grid = [];
        $gridSideSize = sqrt(count($board));
        for ($i=0; $i<$gridSideSize; $i++) {
            $line = array_slice($board, $i*$gridSideSize, $gridSideSize);
            $grid[$i] = $line;
        }

        $tictactoeModel = new TicTacToeModel();

        echo $tictactoeModel->getMove($grid, $mark);

    }

}