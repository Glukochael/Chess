<?php
declare(strict_types=1);

namespace Chess\Pieces;

use Chess\Pieces\Piece;
use Chess\Position;
use Chess\Behaviors\RookBehavior;

class Rook extends Piece
{
	public function __construct($color)
	{
		parent::__construct($color);
		$this->behaviors = [new RookBehavior];
        $this->setMovablePositions();
	}
}