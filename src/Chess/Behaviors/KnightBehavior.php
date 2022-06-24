<?php
declare(strict_types=1);

namespace Chess\Behaviors;

use Chess\Position;

class KnightBehavior implements Behavior
{
	public function getMovablePositions(): array
	{
		return [
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