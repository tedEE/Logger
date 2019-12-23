<?php

namespace Logger;
class NullLogger extends AbstractLogger
{
    public function writeLog($message)
    {
        return;
    }
}
