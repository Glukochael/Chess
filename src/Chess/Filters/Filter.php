<?php
declare(strict_types=1);

namespace Chess\Filters;

use Chess\Position;
use Chess\Board\Board;
use Chess\Pieces\Piece;
use Chess\Filters\BehaviorFilters;

class Filter
{
	public function __construct(
		private array $filtersOfBehavior,
	) {}

	public function calculatePositionsWithPiecePosition(array $positions, Position $piecePosition): array
	{
		$realPositions = [];
		foreach ($positions as $position) {
			$realPositions[] = $position->additionPositions($piecePosition);
		}
		return $realPositions;
	}

	public function filterPositions(Piece $piece, Position $piecePosition, array $positions, Board $board): array
	{
		$positions = $this->calculatePositionsWithPiecePosition($positions, $piecePosition);
		$apropriateWithBoardPositions = [];
		foreach ($positions as $position) {
			$check = false;
			foreach ($this->filtersOfBehavior as $filterBehavior) {
				if ($filterBehavior->filterPosition($piece, $piecePosition, $position, $board)) {
					$check = true;
				}
			}
			if ($check) {
				$apropriateWithBoardPositions[] = $position;
			}
		}
		return $apropriateWithBoardPositions;
	}

	public function mathPositionWithPiecesMovesets(Position $position, array $movablePositions): bool
	// Для В О В Ы. Ета функция нужна, когда мы сами прописываем ход, и нам нужно сверить, что он есть в возможных ходах для фигуры
	{
		foreach ($movablePositions as $moveset) {
			if ($position === $moveset) {
				return true;
			}
		}
		return false;
	}

}