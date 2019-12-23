<?php


namespace Logger;


trait LoggingTrait
{
    private $logers = [];
    private $universalLoger;
    private $universalLogerActive = false; // поле которое активирует универсальный логер

    /**
     * @param $name
     * @param $arguments
     * метод обеспечивающиц вызов метода log в виде $logger->info('Info message');
     */
    public function __call($name, $arguments)
    {
        $level = '';
        switch ($name) {
            case 'error':
                $level = LogLevel::LEVEL_ERROR;
                break;
            case 'info':
                $level = LogLevel::LEVEL_INFO;
                break;
            case 'debug':
                $level = LogLevel::LEVEL_DEBUG;
                break;
            case 'notice':
                $level = LogLevel::LEVEL_NOTICE;
                break;
            default :
                return;
        }
        $this->log($level, $arguments[0]);

    }


    public function log($log_level, $log_message)
    {
       // вызов универсального логера
        if ($this->universalLogerActive) {
            $this->universalLoger->define_universal_loger($log_level, $log_message);
        }
        foreach ($this->logers as $log) {

            if ($log_level[1] == $log[0]->getLevel()) {
                $log[0]->writeLog($log_message);
            }
        }
    }
}
