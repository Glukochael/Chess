<?php
declare(strict_types=1);

namespace Chess\Filters;

use Chess\Pieces\Piece;
use Chess\Filters\Filter;
use Chess\Filters\BehaviorFilters\BehaviorFilter;
use Chess\Filters\BehaviorFilters\PawnBehaviorFilter;

class FilterFactory
{
	private array $filters = [];

	public function getFilterByPiece(Piece $piece): Filter
	{
		$className = explode('\\', get_class($piece));
        $className = end($className);
		if (array_key_exists($className, $this->filters)) {
			return $this->filters[$className];
		}
		$filtersOfBehavior = [];
		foreach ($piece->getBehaviors() as $behavior) {
			$path = explode("\\", get_class($behavior));
			$fullNameBehaviorFilter = '\Chess\Filters\BehaviorFilters\\' . end($path) . 'Filter';
            if (class_exists($fullNameBehaviorFilter)) {
                $filtersOfBehavior[] = new $fullNameBehaviorFilter();
            }
		}
		$this->filters[$className] = new Filter($filtersOfBehavior);
		return $this->filters[$className];
	}
}