<?php
declare(strict_types=1);

namespace Chess\Behaviors;

use Chess\Position;

class PawnBehavior extends Behavior
{
	public function getMovablePositions($colorOffset): array
	{
        //зачем так? зачем промежуточная переменная, когда можно сразу вернуть результат.
		$movablePositions = [
			new Position(0, $colorOffset), 
			new Position(0, $colorOffset + $colorOffset), 
			new Position($colorOffset, $colorOffset), 
			new Position(-$colorOffset, $colorOffset),
		];
		return $movablePositions;
	}
} 