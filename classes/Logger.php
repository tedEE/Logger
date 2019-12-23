<?php

namespace Logger ;


class Logger implements Logging
{
    use LoggingTrait;


    public function addLogger(AbstractLogger $logger)
    {
        if (array_key_exists('levels', $logger->getArraySet())) {
            // заполнение массива logers[
            //                             ERROR => [объекты логеры ошибок],
            //                             INFO => [объекты логеры информационные],
            //                             DEBUG => [объекты логеры дебагинга], ]
            $this->logers[$logger->getLevel()][] = $logger;
        } else {
            if (get_class($logger) == NullLogger::class){
                return;
            }
            $this->universalLogerActive = true;
            $this->universalLoger = $logger;
        }
    }
}
