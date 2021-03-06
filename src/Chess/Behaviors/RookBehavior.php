<?php
declare(strict_types=1);

namespace Chess\Behaviors;

use Chess\Position;
use Chess\Behaviors\Behavior;

class RookBehavior implements Behavior
{
	public function getMovablePositions(): array
	{
		$movablePositions = [];
		for ($shift = 1; $shift <= HEIGHT || $shift <= WIDTH; $shift++) {
			$movablePositions[] = new Position(0, $shift);
			$movablePositions[] = new Position(0, -$shift);
			$movablePositions[] = new Position($shift, 0);
			$movablePositions[] = new Position(-$shift, 0);
		}
		return $movablePositions;
	}
}