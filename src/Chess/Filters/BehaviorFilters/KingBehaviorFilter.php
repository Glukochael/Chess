<?php

namespace Chess\Filters\BehaviorFilters;

use Chess\Board\Board;
use Chess\Pieces\Piece;
use Chess\Position;

class KingBehaviorFilter implements BehaviorFilter
{

    public function filterPosition(Piece $piece, Position $piecePosition, Position $position, Board $board): bool
    {

    }
}