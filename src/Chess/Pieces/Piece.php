<?php
declare(strict_types=1);

namespace Chess\Pieces;

use Chess\Behaviors\Behavior;
use Chess\Position;

abstract class Piece
{
    //массив чего блеать?
    /**
     * @var Behavior[]
     */
	protected array $behaviors = [];
    //массив чего блеать?
    /**
     * @var Position[]
     */
	protected array $movesets = [];
    //очень странно, что цвет это число
	protected int $color;

	public function __construct($color)
	{
		$this->color = $color;
	}

    /**
     * просто пызда, когда метод называется get///, но нифига не возвращает
     */
	protected function getMovablePositions(): void
	{
		foreach ($this->behaviors as $behavior) {
			$this->movesets = $behavior->getMovablePositions($this->color);
		}
	}

	public function getMovesets(): array
	{
		if (!$this->movesets) {
            //здесь побочный эффект
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
