<?php

use App\Outputter\FileOutputter;
use App\Parser\MovementsParser;
use App\Services\RobotInstructionsService;

require_once realpath("vendor/autoload.php");

$input = readline("Type Instructions(it must be one of the following F R L B): ");

$instructions = new RobotInstructionsService((new MovementsParser())->setInput($input) , new FileOutputter());
$instructions->moveRobot();
