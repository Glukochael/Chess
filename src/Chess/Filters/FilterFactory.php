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
        //мне кажется, что это плохой способ вот так расковыривать путь.
		$className = explode('\\', get_class($piece));
		if (array_key_exists(end($className), $this->filters)) {
            //чего блеать. используешь объект как ключ?
			return $this->filters[$piece];
		}
		$filtersOfBehavior = [];
		foreach ($piece->getBehaviors() as $behavior) {
			$path = explode("\\", get_class($behavior));
			$fullNameBehaviorFilter = '\Chess\Filters\BehaviorFilters\\' . end($path) . 'Filter';
            //ты тут даже не проверяешь, существует ли такой класс. можно дико обосраться
			$filtersOfBehavior[] = new $fullNameBehaviorFilter();
		}
        //нахера постоянно делать этот end(className)? почему нельзя сделать это один раз?
		$this->filters[end($className)] = new Filter($filtersOfBehavior);
        //нахера сначала класть, а потом доставать? работы мало?
		return $this->filters[end($className)];
	}
}