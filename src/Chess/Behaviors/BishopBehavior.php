<?php
declare(strict_types=1);

namespace Chess\Behaviors;

use Chess\Position;
use Chess\Behaviors\Behavior;

class BishopBehavior extends Behavior
{
	public function getMovablePositions($colorOffset): array
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