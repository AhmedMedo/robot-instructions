<?php
namespace App\Outputter;

class FileOutputter
{

    protected $x_direction;
    protected $y_direction;
    public $is_final = false;

    public function setX($x_direction)
    {
        $this->x_direction = $x_direction;
    }
    public function getX()
    {
        return $this->x_direction;
    }

    public function setY($y_direction)
    {
        $this->y_direction =  $y_direction;
    }
    public function getY()
    {
        return $this->y_direction;
    }

    public function getData()
    {
        return $this->data;
    }

    public function save()
    {

        if (!file_exists(__DIR__."/../Result")) {
            mkdir(__DIR__."/../Result", 0777, true);
        }
        file_put_contents(__DIR__."/../Result/".time().".txt", ($this->is_final ? $this->buildFinalContent() :$this->buildContent())."\n", FILE_APPEND | LOCK_EX);
    }

    public function buildContent()
    {
        return "Direction X = {$this->getX()} & Direction Y = {$this->getY()}";
    }
    public function buildFinalContent()
    {
        return "Final Direction X = {$this->getX()} & Final Direction Y = {$this->getY()}";
    }
}