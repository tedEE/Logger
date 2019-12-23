<?php

namespace Logger;
abstract class AbstractLogger
{
    protected $array;
    protected $level_code;
    protected $level;
    protected $message;
    public function __construct($array)
    {
        $this->array = $array;
        $this->level_code = $array['levels'][0][0];
        $this->level = $array['levels'][0][1];
        $this->message = $array['levels'][0][2];
    }

    public function getArraySet(){
        return $this->array;
    }

    public function getLevelCode(){
        return $this->level_code;
    }
    public function getLevel(){
        return $this->level;
    }
    public function getMessage(){
        return $this->message;
    }

    protected function check_for_enabled($array)
    {
        if ($array['is_enabled']) {
            return true;
        }
        return false;
    }

    abstract public function writeLog($message);

}
