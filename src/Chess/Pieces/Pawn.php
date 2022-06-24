<?php
declare(strict_types=1);

namespace Chess\Pieces;

use Chess\Pieces\Piece;
use Chess\Position;
use Chess\Behaviors\PawnBehavior;

class Pawn extends Piece
{
	public function __construct($color)
    {
        parent::__construct($color);
        $this->behaviors = [new PawnBehavior];
        $this->setMovablePositions();
    }
    protected function setMovablePositions(): void
    {
        foreach ($this->behaviors as $behavior) {
            foreach ($behavior->getMovablePositions() as $move) {
                $this->movesets[] = $move->multiplicationPosition($this->color);
            }
        }
    }
}
