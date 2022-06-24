<?php
declare(strict_types=1);

namespace Chess\Behaviors;

use Chess\Position;

class BishopBehavior implements Behavior
{
	public function getMovablePositions(): array
	{
		$movablePositions = [];
		for ($shift = 1; $shift <= HEIGHT || $shift <= WIDTH; $shift++) {
			$movablePositions[] = new Position($shift, $shift);
			$movablePositions[] = new Position($shift, -$shift);
			$movablePositions[] = new Position(-$shift, $shift);
			$movablePositions[] = new Position(-$shift, -$shift);
		}
		return $movablePositions;
	}
}