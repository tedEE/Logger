<?php


namespace Logger;


interface Logging
{
    public function __call($name, $arguments);
    public function log($log_level, $log_message);
}
