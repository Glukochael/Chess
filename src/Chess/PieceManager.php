<?php

namespace Chess;

use Chess\Board\Board;
use Chess\Filters\FilterFactory;

class PieceManager
{
    public FilterFactory $factory;

    public function __construct()
    {
        $this->factory = new FilterFactory();
    }

    public function refreshPositions(Board $board): void
    {
        $pieces = $board->getPieces();
        $positions = $board->getPositions();
        foreach ($pieces as $piece) {
            $filter = $this->factory->getFilterByPiece($piece);
            $piece->setMovablePositions($filter->filterPositions($piece, $board->getPositionByPiece($piece),
                $piece->getMovesets(), $board));
        }
    }
}