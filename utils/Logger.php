<?php

namespace Commons\utils;

use Commons\utils\Logger;

class Logger {

    public static $loggingActive = 0;

    /**
     *
     */
    public static function log($text) {

        if (Logger::$loggingActive) {
            $text = preg_replace("/\r|\n/", "\n", $text);
            $lines = explode("\n", $text);

            $file = 'log.txt';
            // Open the file to get existing content
            $current = file_get_contents($file);

            foreach ($lines as $value) {
                $value = trim($value);
                if ($value != "") {
                    $current .= $value . "\n";
                }
            }
            // Write the contents back to the file
            file_put_contents($file, $current);
        }
    }
}
