<?php
declare(strict_types=1);

namespace Chess\Behaviors;

use Chess\Position;
use Chess\Behaviors\Behavior;

class PawnBehavior extends Behavior
{
	public function getMovablePositions($colorOffset): array
	{
		$movablePositions = [
			new Position(0, $colorOffset), 
			new Position(0, $colorOffset + $colorOffset), 
			new Position($colorOffset, $colorOffset), 
			new Position(-$colorOffset, $colorOffset),
		];
		return $movablePositions;
	}
} 