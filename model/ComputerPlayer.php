<?php

namespace model;

class ComputerPlayer {

	//TODO: Calculate these instead
	//TODO: These values are dependent on LastStickGame::STARTING_NUMBER_OF_STICKS
	//TODO: These values are also dependent on \model\StickSelection::MIN_SELECTION and StickSelection::MAX_SELECTION
	private static $DESIRED_AMOUNT_AFTER_DRAW = array(21, 17, 13, 9, 5, 1);

	private $gameState;
	private $lastMove;


	public function __construct(LastStickGame $state) {
		$this->gameState = $state;
	}
	
	
	public function getSelection() : StickSelection{
		$amountOfSticksLeft = $this->gameState->getNumberOfSticks();

		$numberOfSticksToDraw = 0;

		foreach (self::$DESIRED_AMOUNT_AFTER_DRAW as $desiredStics) {
			if ($amountOfSticksLeft > $desiredStics ) {
				$difference = $amountOfSticksLeft - $desiredStics;

				if ($difference > 3 || $difference < 1) {
					//AI Player can still loose
					$numberOfSticksToDraw = rand() % StickSelection::MAX_SELECTION + \model\StickSelection::MIN_SELECTION; // [1-3]
				} else {

					//AI Player has already won, 
					$numberOfSticksToDraw = $difference;
				}
				break;
			}
			
		}

		$this->lastMove = new StickSelection($numberOfSticksToDraw);

		return $this->lastMove;
	}


	public function hasMoved() : bool {
		return $this->lastMove != null;
	}


	public function getLastMove() : StickSelection {
		if ($this->hasMoved() == false)
			throw new \Exception("Has not made move yet");
		return $this->lastMove;
	}
}