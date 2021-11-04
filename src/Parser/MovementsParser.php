<?php
namespace App\Parser;

class MovementsParser 
{

    public function setInput($input)
    {
        $this->input = $input ;

        return $this;
    }

    public function getInput()
    {
        return $this->input;
    }
    public function validate():bool
    {
        foreach($this->toArray() as $item)
        {
            if(!in_array($item , $this->allowedMovements()))
            {
                echo $item." is not accepted movement instruction";
                exit;
            }
        }

        return true;
    }

    /**
     * Return array representation of the instructions
     */

    public function toArray():array
    {
        return str_split(strtoupper($this->getInput()));
    }

    private function allowedMovements()
    {
        return ["F","B","R","L"];
    }
    
}