<?php
declare(strict_types=1);

namespace Chess\Behaviors;

//почему это не интерфейс, если в нем вообще нет никакой реализации?
abstract class Behavior
{
	abstract function getMovablePositions($colorOffset);
} 