<?php
declare(strict_types=1);

namespace Chess\Pieces;

use Chess\Pieces\Piece;
use Chess\Position;
use Chess\Behaviors\BishopBehavior;

class Bishop extends Piece
{
	public function __construct($color)
	{
		parent::__construct($color);
		$this->behaviors = [new BishopBehavior];
        $this->setMovablePositions();
	}
}