<?php
declare(strict_types=1);

namespace Chess;

use Chess\Position;
use Chess\Pieces\Piece;
use Chess\Board\Board;

class GraphicSystem
{
	public function draw(Board $board): void
	{
		$aliasesPiecesMap = [
			"Pawn" => "p",
			"King" => "k",
			"Bishop" => "b",
			"Queen" => "q",
			"Knight" => "n",
			"Rook" => "r",
		];
		$positions = $board->getPositions();
		for($width = WIDTH - 1; $width >= 0; $width--) {
			$line[] = ".";
		}
		for($height = HEIGHT - 1; $height >= 0; $height--) {
			$lines[] = $line;
		}
		foreach($board->getPieces() as $key => $piece) {
			$name = explode("\\", get_class($piece));
			if ($piece->getColor() === WHITE) {
				$skin = strtoupper($aliasesPiecesMap[end($name)]);
			}
			else {
				$skin = $aliasesPiecesMap[end($name)];
			}
			$lines[$positions[$key]->getYCoordinate()][$positions[$key]->getXCoordinate()] = $skin;
		}
		$paintedBoard = "";
		foreach($lines as $line) {
			foreach($line as $symb) {
				$paintedBoard .= $symb;
				$paintedBoard .= " ";
			}
			$paintedBoard .= "\n";
		}
		echo $paintedBoard;
	}

}