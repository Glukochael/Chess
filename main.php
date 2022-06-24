<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

const
	WHITE = -1,
	BLACK = 1;
const
	WIDTH = 8,
	HEIGHT = 8;

use Chess\Board\Board;
use Chess\Position;
use Chess\Pieces\Piece;
use Chess\Pieces\Pawn;
use Chess\Pieces\Rook;
use Chess\GraphicSystem;
use Chess\Filters\FilterFactory;
use Chess\Filters\Filter;
use Chess\Filters\BehaviorFilters\BehaviorFilter;


$board = new Board();
$graphic = new GraphicSystem();
$board->setStartPosition();
$position = new Position(1, 7);
$board->addPiece(new Position(2, 5), new Pawn(BLACK));
$piece = $board->getPieceByPosition($position);
$movablePositions = $piece->getMovesets();
$factory = new FilterFactory();
$filter = $factory->getFilterByPiece($piece);

print_r($filter->filterPositions($piece, $position, $movablePositions, $board));
$rook = $board->getPieceByPosition(new Position(0, 0));
$knight = $board->getPieceByPosition(new Position(1, 7));
$graphic->draw($board);
//print_r($board->getPieces());
