<?php
declare(strict_types=1);

namespace Chess\Filters\BehaviorFilters;

use Chess\Position;
use Chess\Pieces\Piece;
use Chess\Board\Board;
use Chess\Filters\BehaviorFilters\BehaviorFilter;

class PawnBehaviorFilter extends BehaviorFilter
{
	public function filterPosition(Piece $piece, Position $piecePosition, Position $position, Board $board)
	{
		$colorShift = $piece->getColor();
		$barrier = $this->hasBarrier($piece, $piecePosition, $board);
		$startPosition = $this->isStartPawnPosition($piecePosition);
		$oneSquareMove = new Position($piecePosition->getXCoordinate(), ($piecePosition->getYCoordinate() + $colorShift));
		$twoSquareMove = new Position($piecePosition->getXCoordinate(), ($piecePosition->getYCoordinate() + (2 * $colorShift)));
		if ($this->isMovePosition($piece, $piecePosition, $position, $board)) {

			if ($barrier == 1) {
				return false;
			}	
			elseif ($barrier == 2) {
				if ($position == $oneSquareMove) {
					return true;
				}
			}
			else {
				if ($startPosition) {
					if ($position == $oneSquareMove or $position == $twoSquareMove) {
						return true;
					}
				}
				else {
					if ($position == $oneSquareMove) {
						return true;
					}
				}
			}

		}
		if ($this->isAttackPosition($piece, $piecePosition, $position, $board)) {
			return true;
		}
		return false;
	}

	private function isStartPawnPosition(Position $piecePosition): bool
	{
		$x = $piecePosition->getXCoordinate();
		if ($piecePosition === new Position($x, 1) or new Position($x, HEIGHT - 2)) {
			return true;
		}
		return false;
	}

	private function isAttackPosition(Piece $piece, Position $piecePosition, Position $position, Board $board): bool
	{
		$colorShift = $piece->getColor();
		if ($position === $piecePosition->additionPositions(new Position(-$colorShift, $colorShift)) or $piecePosition->additionPositions(new Position($colorShift, $colorShift))) {
			if ($board->getPieceByPosition($position) !== null) {
				return true;
			}
		}
		return false;
	}

	private function isMovePosition(Piece $piece, Position $piecePosition, Position $position, Board $board): bool
	{
		$colorShift = $piece->getColor();
		if ($position == $piecePosition->additionPositions(new Position(0, $colorShift)) or $position == $piecePosition->additionPositions(new Position(0, 2 * $colorShift))) {
			return true;
		}
		return false;
	}

	private function hasBarrier(Piece $piece, Position $piecePosition, Board $board): int
	{
		$colorShift = $piece->getColor();
		if ($board->getPieceByPosition($piecePosition->additionPositions(new Position(0, $colorShift)))) {
			return 1;
		}
		if ($board->getPieceByPosition($piecePosition->additionPositions(new Position(0, 2 * $colorShift)))) {
			return 2;
		}
		return 0;
	}

}