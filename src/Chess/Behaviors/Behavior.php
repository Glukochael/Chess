<?php
declare(strict_types=1);

namespace Chess\Behaviors;

abstract class Behavior
{
	abstract function getMovablePositions($colorOffset);
} 