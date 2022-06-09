<?php
declare(strict_types=1);

namespace Chess\Board;

use Chess\Position;
use Chess\Pieces\Piece;


class Board
{
	private array $positions = [];
	private array $pieces = [];

	public function addPiece(Position $position, Piece $piece): void
	{
		$this->positions[] = $position;
		$this->pieces[] = $piece;
	}

	public function removePieceByPosition(Position $position):void
	{
		$removeKey = array_search($position, $this->positions);
		if ($removeKey !== false) {
			array_splice($this->positions, $removeKey, 1);
			array_splice($this->pieces, $removeKey, 1);
		}
	}

	public function getPieces(): array
	{
		return $this->pieces;
	}

	public function getPieceByPosition(Position $position): ?Piece
	{
		$index = array_search($position, $this->positions);
		if ($index !== false) {
			return $this->pieces[$index];
		}
		return null;
        /**
         * не думаю, что тут стоит использовать array_search. лучше сделать для Position метод equals, где сравнить x, y
         * $index = array_search($position, $this->positions);
         * if ($index === false) {
         *      return null;
         * }
         *
         * return $this->pieces[$index];
         */
	}

	public function getPositions(): array
	{
		return $this->positions;
	}

	public function setFENpositions(string $fen): void
	{
		$this->positions = [];
		$this->pieces = [];
		$aliasesPiecesMap = [
			"P" => "Pawn",
			"K" => "King",
			"B" => "Bishop",
			"Q" => "Queen",
			"N" => "Knight",
			"R" => "Rook",
		];
		if (strpos($fen, " ")) {
			$fen = substr_replace($fen, '', strpos($fen, " "));
		}
		$lines = [];
		foreach (explode("/", $fen) as $line) {
			$lines[] = str_split($line);
		}
		foreach ($lines as $y => $line) {
			$shift = 0;
			foreach ($line as $x => $ch) {
				if (is_numeric($ch)) {
					$shift += (int)$ch + 1;
					continue;
				}
				$fullNamePieces = '\Chess\Pieces\\' . $aliasesPiecesMap[strtoupper($ch)];
				$this->addPiece(new Position($x + $shift, $y), new $fullNamePieces(
					strtoupper($ch) === $ch ? WHITE : BLACK
				));
			}
		}
		
	}

	public function setStartPosition(): void
	{
		$this->positions = [];
		$this->pieces = [];
		$this->setFENpositions("rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR");
	}

}
