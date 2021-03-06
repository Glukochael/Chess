<?php
declare(strict_types=1);

namespace Chess\Pieces;

use Chess\Pieces\Piece;
use Chess\Position;
use Chess\Behaviors\RookBehavior;
use Chess\Behaviors\BishopBehavior;


class Queen extends Piece
{
	public function __construct($color)
	{
		parent::__construct($color);
		$this->behaviors = [new RookBehavior, new BishopBehavior];
        $this->setMovablePositions();
	}
}