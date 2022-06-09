<?php
declare(strict_types=1);

namespace Chess\Pieces;

abstract class Piece
{
	protected array $behaviors = [];
	protected array $movesets = [];
	protected int $color;

	public function __construct($color)
	{
		$this->color = $color;
	}

	protected function getMovablePositions(): void
	{
		foreach ($this->behaviors as $behavior) {
			$this->movesets = $behavior->getMovablePositions($this->color);
		}
	}

	public function getMovesets(): array
	{
		if (!$this->movesets) {
			$this->getMovablePositions();
		}
		return $this->movesets;
	}

	public function getColor(): int
	{
		return $this->color;
	}

	public function getBehaviors(): array
	{
		return $this->behaviors;
	}
}
