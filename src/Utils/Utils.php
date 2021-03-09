<?php


namespace App\Utils;


class Utils
{
    const SECONDS_IN_MINUTE = 60;
    const SECONDS_IN_HOUR = 60 * self::SECONDS_IN_MINUTE;
    const SECONDS_IN_DAY = 24 * self::SECONDS_IN_HOUR;

    /**
     * @param int $duration
     * @return string
     */
    public static function getDurationText(int $duration): string
    {
        // Get Days
        $days = floor($duration/self::SECONDS_IN_DAY);

        // Get Hours
        $hrS = $duration % self::SECONDS_IN_DAY;
        $hr = floor($hrS / self::SECONDS_IN_HOUR);

        // Get Minutes
        $minS = $hrS % self::SECONDS_IN_HOUR;
        $min = floor($minS / self::SECONDS_IN_MINUTE);

        // Get Seconds
        $secs = $minS % self::SECONDS_IN_MINUTE;
        $sec = ceil($secs);

        $duration_string = "";
        if ($days != 0) {
            if ($days == 1){
                $duration_string = $duration_string . $days . " day ";
            } else {
                $duration_string = $duration_string . $days . " days ";
            }
        }
        if ($hr != 0) {
            $duration_string = $duration_string . $hr . "h";
        }
        if ($min != 0) {
            $duration_string = $duration_string . $min . "m";
        }

        $duration_string = $duration_string . $sec . "s";

        return $duration_string;
    }
}