<?php
declare(strict_types=1);

namespace Chess\Behaviors;

use Chess\Position;
use Chess\Behaviors\Behavior;

class KnightBehavior extends Behavior
{
	public function getMovablePositions($colorOffset): array
	{
		return $movablePositions = [
			new Position(1, 2),
			new Position(-1, 2),
			new Position(2, 1),
			new Position(2, -1),
			new Position(1, -2),
			new Position(-1, -2),
			new Position(-2, 1),
			new Position(-2, -1),
		];
	}

}