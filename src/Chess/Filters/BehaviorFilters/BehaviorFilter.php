<?php
declare(strict_types=1);

namespace Chess\Filters\BehaviorFilters;

use Chess\Position;
use Chess\Pieces\Piece;
use Chess\Board\Board;

abstract class BehaviorFilter
{
	abstract function filterPosition(Piece $piece, Position $piecePosition, Position $position, Board $board);
}