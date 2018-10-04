<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("controller/PlayGame.php");
require_once("view/HTMLPage.php");
require_once("model/ComputerPlayer.php");
require_once("model/SticksPile.php");


//Setup
session_start();


//Load state 
if (isset($_SESSION["savegame"]) == false) {
	$game = new \model\LastStickGame(new \model\SticksPile());
} else {
	$game = $_SESSION["savegame"];
}

$computerPlayer = new \model\ComputerPlayer($game);
$view = new \view\GameView($game, $computerPlayer);
$controller = new controller\PlayGame($game, $view, $computerPlayer);

$controller->handleGameInput();


//Generate output
$page = new view\HTMLPage();
$page->echoPage($view->getHTMLTitle(), $view->getHTMLBody());




