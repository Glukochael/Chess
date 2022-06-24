<?php
declare(strict_types=1);

namespace Chess\Pieces;

use Chess\Behaviors\Behavior;
use Chess\Position;

abstract class Piece
{
    /**
     * @var Behavior[]
     */
	protected array $behaviors = [];
    /**
     * @var Position[]
     */
	protected array $movesets = [];
	protected int $color;

	public function __construct($color)
	{
		$this->color = $color;
	}

	protected function setMovablePositions(): void
	{
		foreach ($this->behaviors as $behavior) {
			foreach ($behavior->getMovablePositions() as $move) {
                $this->movesets[] = $move;
            }
		}
	}

	public function getMovesets(): array
	{
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
