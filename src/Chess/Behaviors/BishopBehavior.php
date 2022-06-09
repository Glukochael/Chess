<?php
declare(strict_types=1);

namespace Chess\Behaviors;

use Chess\Position;

class BishopBehavior extends Behavior
{
	public function getMovablePositions($colorOffset): array
	{
		$movablePositions = [];
        //лучше не использовать глобальные значения.
		for ($shift = 1; $shift <= HEIGHT || $shift <= WIDTH; $shift++) {
			$movablePositions[] = new Position($shift, $shift);
			$movablePositions[] = new Position($shift, -$shift);
			$movablePositions[] = new Position(-$shift, $shift);
			$movablePositions[] = new Position(-$shift, -$shift);
		}
		return $movablePositions;
	}
}