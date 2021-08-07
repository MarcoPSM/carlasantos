<?php

namespace app\models\tictactoe;

class Player
{
    private string $name;
    private string $mark;
    private string $color;
    private bool $isHuman;
    private string $opponent;


    public function __construct(string $name, bool $isHuman)
    {
        $this->name = $name;
        $this->isHuman = $isHuman;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMark(): string
    {
        return $this->mark;
    }

    public function setMark(string $mark): void
    {
        $this->mark = $mark;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getIsHuman(): bool
    {
        return $this->isHuman;
    }

    public function move(Board $board): string
    {
        $this->opponent = $this->mark === Mark::O ? Mark::X : Mark::O;
        return $this->getBestMove($board);

    }

    private function getBestMove(Board $board): string
    {
        $bestMove = [];
        $bestValue = PHP_INT_MIN;
        $grid = $board->getGrid();
        $boardSide = $board->getSideSize();

        for ($i=0; $i < $boardSide; $i++) {
            for ($j=0; $j < $boardSide; $j++) {
                if ($grid[$i][$j] === Mark::BLANK) {
                    $board->setCell($i, $j, $this->mark);
                    $value = $this->miniMax($board, 0, false);

                    $board->setCell($i, $j, Mark::BLANK);

                    if ($value > $bestValue) {
                        // Grid index starts at 1.
                        // We add 1 for consistency with human players
                        $bestMove = [$i, $j];
                        $bestValue = $value;
                    }
                }
            }
        }
        return $bestMove[0] . $bestMove[1];
    }


    private function miniMax(Board $board, int $depth, bool $isMax):int
    {
        $grid = $board->getGrid();
        $boardSide = $board->getSideSize();
        //$score = $this->evaluate($grid, $depth);
        $score = $board->evaluate($this->mark);

        if ($score !== 0) {
            return $score;
        }
        if (! $board->isMovesLeft()) {
            return 0;
        }

        if ($isMax) {
            $best = PHP_INT_MIN;
            for ($i=0; $i < $boardSide; $i++) {
                for ($j=0; $j < $boardSide; $j++) {
                    if ($grid[$i][$j] === Mark::BLANK) {
                        $board->setCell($i, $j, $this->mark);
                        $grid[$i][$j] = $this->mark;
                        $best = max($best, $this->miniMax($board, $depth + 1, !$isMax));
                        $board->setCell($i, $j, Mark::BLANK);
                    }
                }
            }

            // Given 2 moves with score 10,
            // chose the shortest path
            return $best - $depth;
        } else {
            $best = PHP_INT_MAX;
            for ($i=0; $i < $boardSide; $i++) {
                for ($j=0; $j < $boardSide; $j++) {
                    if ($grid[$i][$j] === Mark::BLANK) {
                        $board->setCell($i, $j, $this->opponent);
                        $best = min($best, $this->miniMax($board, $depth + 1, !$isMax));
                        $board->setCell($i, $j, Mark::BLANK);
                    }
                }
            }

            return $best + $depth;
        }
    }

}