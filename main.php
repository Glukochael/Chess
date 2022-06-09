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
$graphic->draw($board);
$position = new Position(3, 6);
$piece = $board->getPieceByPosition($position);
$movablePositions = $piece->getMovesets();
$factory = new FilterFactory;//лучше писать скобки. потому что единый стиль это важно. выше у тебя почему-то определяются со скобками.
$filter = $factory->getFilter($piece);//ByPiece?
print_r($filter->filterPositions($piece, $position, $movablePositions, $board));
//print_r($board->getPieces());
