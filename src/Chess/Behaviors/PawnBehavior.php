<?php
declare(strict_types=1);

namespace Chess\Behaviors;

use Chess\Position;

class PawnBehavior implements Behavior
{
	public function getMovablePositions(): array
	{
		return [
			new Position(0, 1),
			new Position(0, 2),
			new Position(1, 1),
			new Position(-1, 1),
		];
	}
} 