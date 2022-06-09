<?php
declare(strict_types=1);

namespace Chess;

class Position
{
	public function __construct(
		private int $x,
		private int $y,
	){}

	public function additionPositions(Position $position): Position
	{
		return new Position($this->x + $position->x, $this->y + $position->y);
	}

	public function getXCoordinate(): int
	{
		return $this->x;
	}

	public function getYCoordinate(): int
	{
		return $this->y;
	}
}