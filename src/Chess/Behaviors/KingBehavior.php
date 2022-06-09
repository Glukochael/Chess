<?php
declare(strict_types=1);

namespace Chess\Behaviors;

use Chess\Position;
use Chess\Behaviors\Behavior;

class KingBehavior extends Behavior
{
	public function getMovablePositions($colorOffset): array
	{
		return $movablePositions = [
			new Position(-1, 0),
			new Position(-1, 1),
			new Position(0, 1),
			new Position(1, 1),
			new Position(1, 0),
			new Position(1, -1),
			new Position(0, -1),
			new Position(-1, -1),
		];
	}
}