<?php

namespace model;


class SticksPile {
	

	private $numSticks;

	public function __construct() {
		$this->newGame();

	}

	public function newGame() {
		$this->numSticks = 22;
	}

	/**
	 * Its game over if its only 1 stick left
	 */
	public function isGameOver() : bool {
		return $this->numSticks < 2;
	}

	/**
	 * @return int 
	 */
	public function getNumberOfSticks() : int {
		return $this->numSticks;
	}

	/**
	 * We can only remove 1-3 sticks 
	 * Cannot remove more than we have
	 */
	public function removeSticks(StickSelection $selection) {
		
		if($selection->getNumSticks() > $this->numSticks)
			throw new \Exception("Not allow to draw more than the pile contains");

		$this->numSticks -= $selection->getNumSticks();
	}
}