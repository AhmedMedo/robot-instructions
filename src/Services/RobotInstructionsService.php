<?php
namespace App\Services;

use App\Outputter\FileOutputter;
use App\Parser\MovementsParser;

class RobotInstructionsService
{
    protected $parser;
    protected $outputter;

    public function __construct(MovementsParser $parser , FileOutputter $outputter)
    {
        $this->parser = $parser;
        $this->outputter = $outputter;
    }

    public function moveRobot():void
    { 
        $this->parser->validate();
        $this->outputter->setData($this->parser->toArray());

        $x = 0;
        $y = 0;
        for ($i=0; $i < count($this->parser->toArray()); $i++) {
            if($this->parser->toArray()[$i] == 'R'){
                $x+=1;
                
            }
            if($this->parser->toArray()[$i] == 'L'){
                $x = max($x-1 , 0);
            }
            if($this->parser->toArray()[$i] == 'F'){
                $y+=1; 
            }
            if($this->parser->toArray()[$i] == 'B'){
                $y = max($y-1 , 0);
            }
            $this->outputter->save("Direction X = {$x} & Direction Y = {$y}");
        }

        $this->outputter->save("Final Direction X = {$x} & Final Direction Y = {$y}");
        
    }


}