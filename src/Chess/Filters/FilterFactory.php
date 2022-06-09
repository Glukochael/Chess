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

	public function getFilter(Piece $piece): Filter
	{
		$className = explode('\\', get_class($piece));
		if (array_key_exists(end($className), $this->filters)) {
			return $this->filters[$piece];
		}
		$filtersOfBehavior = [];
		foreach ($piece->getBehaviors() as $behavior) {
			$path = explode("\\", get_class($behavior));
			$fullNameBehaviorFilter = '\Chess\Filters\BehaviorFilters\\' . end($path) . 'Filter';
			$filtersOfBehavior[] = new $fullNameBehaviorFilter();
		}
		$this->filters[end($className)] = new Filter($filtersOfBehavior);
		return $this->filters[end($className)];
	}
}