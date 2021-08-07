<?php

namespace app\models\tictactoe;

use app\models\tictactoe\Mark;

class Board
{
    private const WIN_POINTS = 10;
    private const LOSE_POINTS = -10;
    private int $sideSize;
    private array $grid = [];


    public function __construct(int $sideSize)
    {
        $this->sideSize = $sideSize;
        $line = array_fill(0,$sideSize, Mark::BLANK);
        for ($i=0; $i<$this->sideSize; $i++) {
            $this->grid[$i] = $line;
        }
    }

    public function getGrid(): array
    {
        return $this->grid;
    }

    public function setGrid(array $grid): void
    {
        $this->grid = $grid;
    }

    public function getSideSize(): int
    {
        return $this->sideSize;
    }

    public function isMovesLeft(): bool
    {
        foreach ($this->grid as $line) {
            foreach ($line as $column) {
                if ($column == Mark::BLANK) {
                    return true;
                }
            }
        }
        return false;
    }

    public function setCell(int $x, int $y, string $mark): void
    {
        $this->grid[$x][$y] = $mark;
    }

    /**
     * @throws Exception
     */
    public function update(string $sign, string $input):void
    {
        if (! is_numeric($input) || strlen($input) !== 2) {
            throw new Exception('Position must be 2 digits. Try again.');
        }

        list($x, $y) = str_split($input);

        // Grid index starts at 1 to make it easier for non programmers
        // convert it to zero index.
        $x -= 1;
        $y -= 1;

        if (! isset($this->grid[$x][$y])) {
            throw new Exception('Not a valid cell. Try again.');
        }

        if ($this->grid[$x][$y] !== Mark::BLANK) {
            throw new Exception('Position already taken. Try again');
        }

        $this->setCell($x, $y, $sign);
    }

    public function evaluate(string $mark): int
    {
        //checking for rows
        for($i=0; $i<count($this->grid); $i++) {
            $isLine = true;
            for ($j=0; $j<count($this->grid[$i]) - 1; $j++) {
                if ($this->grid[$i][$j] !== $this->grid[$i][$j+1]) {
                    $isLine=false;
                    break;
                }
            }
            if ($isLine && $this->grid[$i][0] !== Mark::BLANK) {
                return ($this->grid[$i][0] === $mark) ? self::WIN_POINTS : self::LOSE_POINTS;
            }
        }


        // Checking for columns
        for($i=0; $i<count($this->grid[0]); $i++) {
            $isColumn = true;
            for($j=0; $j<count($this->grid) - 1; $j++) {
                if ($this->grid[$j][$i] !== $this->grid[$j+1][$i]) {
                    $isColumn = false;
                    break;
                }
            }
            if ($isColumn && $this->grid[0][$i] !== Mark::BLANK) {
                return ($this->grid[0][$i] === $mark) ? self::WIN_POINTS : self::LOSE_POINTS;
            }
        }

        // Checking for Diagonals
        $isDiagonal = true;
        for($i=0; $i<count($this->grid) - 1; $i++) {
            if ($this->grid[$i][$i] !== $this->grid[$i+1][$i+1]) {
                $isDiagonal = false;
                break;
            }
        }
        if ($isDiagonal && $this->grid[$i][$i] !== Mark::BLANK) {
            return ($this->grid[$i][$i] === $mark) ? self::WIN_POINTS : self::LOSE_POINTS;
        }

        $isDiagonal = true;
        for($i=0; $i<count($this->grid) - 1; $i++) {
            if ($this->grid[$i][count($this->grid[$i]) - 1 - $i] !== $this->grid[$i + 1][count($this->grid[$i]) - 1 - ($i + 1)]) {
                $isDiagonal = false;
                break;
            }
        }
        if ($isDiagonal && $this->grid[0][count($this->grid[0]) - 1] !== Mark::BLANK) {
            return ($this->grid[0][count($this->grid[0]) - 1] === $mark) ? self::WIN_POINTS : self::LOSE_POINTS;
        }
        return 0;
    }

}