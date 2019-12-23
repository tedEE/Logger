<?php

namespace Logger;
class SyslogLogger extends AbstractLogger
{
    public function __construct($array)
    {
        parent::__construct($array);
    }

    public function test()
    {
        echo 'test Suslog' . '\n';
    }


    public function writeLog($message)
    {
       syslog(LOG_DEBUG, $message);
    }
}
