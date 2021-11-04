<?php
namespace App\Outputter;

class FileOutputter
{

    protected $data;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function save($content)
    {

        if (!file_exists(__DIR__."/../Result")) {
            mkdir(__DIR__."/../Result", 0777, true);
        }
        file_put_contents(__DIR__."/../Result/".implode($this->getData()).".txt", $content."\n", FILE_APPEND | LOCK_EX);

        
    }
}