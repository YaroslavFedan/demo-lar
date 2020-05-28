<?php


namespace App\Console;


trait ConsoleMessageTrait
{
    /**
     * Show process data
     * @param $message
     * @param int $total
     * @param int $current
     */
    public function processShow($message, $total = 0, $current = 0)
    {
        echo "\033[61D";      // Move 5 characters backward
        $input = $message . " \e[39m " . $total . "/" . $current;
        $length = strlen($input);
        echo str_pad($input, $length, ' ', STR_PAD_LEFT);
    }

    public function messageShow($message="")
    {
        echo $message.PHP_EOL;
    }
}
