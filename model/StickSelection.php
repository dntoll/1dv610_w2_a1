<?php

namespace model;


class InvalidSticksSelectionException extends \Exception {}

/**
 * Encapsulate how many sticks a player draws
 * can be 1,2 or 3
 */
class StickSelection {

	const MIN_SELECTION = 1;
	const MAX_SELECTION = 3;

	/**
	 * @var int (1,2,3)
	 */
	private $amount;

	public function getNumSticks() : int {
		return $this->amount;
	}

	/**
	 * Private constructor makes sure we cannot create outside of 1,2,3
	 */
	public function __construct(int $amount) {
		$this->amount = $amount;
	}



}