<?php

namespace Chess\Filters\BehaviorFilters;

use Chess\Board\Board;
use Chess\Pieces\Piece;
use Chess\Position;

class KnightBehaviorFilter implements BehaviorFilter
{

    public function filterPosition(Piece $piece, Position $piecePosition, Position $position, Board $board): bool
    {
        $pieceByPosition = $board->getPieceByPosition($position);
        if ($pieceByPosition === null) {
            return true;
        }
        else {
            if ($pieceByPosition->getColor() !== $piece->getColor()) {
                return true;
            }
            return false;
        }
    }
}