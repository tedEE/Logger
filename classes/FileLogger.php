<?php

namespace Logger;
class FileLogger extends AbstractLogger implements Logging
{
    use LoggingTrait;

    public function __construct($array)
    {
        parent::__construct($array);
    }

    /**
     * @param $log_level
     * @param $log_message
     * создание универсального логера записывающего все в файл
     */
    public function define_universal_loger($log_level, $log_message)
    {
        $this->array['levels'][0] = $log_level;
        $data = date('c ') . ' ' . $log_level[0] . ' ' . $log_level[1] . ' ' ;
        file_put_contents($this->define_file(), $data . $log_message . PHP_EOL , FILE_APPEND);
    }

    protected function define_file()
    {
        return $this->array['filename'];
    }

    protected function define_data()
    {
        return  date('c ') . ' ' . $this->getLevelCode() . ' ' . $this->getLevel() . ' ' ; // сообщение будет добавлено в классе Logger
    }

    public function writeLog($message)
    {
        file_put_contents($this->define_file(), $this->define_data() . $message . PHP_EOL , FILE_APPEND);
    }


}
