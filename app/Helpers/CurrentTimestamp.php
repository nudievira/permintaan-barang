<?php

namespace App\Helpers;

/**
 * Helpers for return current timestamp
 */
class CurrentTimestamp
{
    public static function getCurrent($formatter = null)
    {
        $currentTimestamp = date('Y-m-d H:i:s');
        if (is_null($formatter)) {
            return $currentTimestamp;
        } else {
            return strtotime($currentTimestamp);
        }
    }

    public static function getDate($formatter = null)
    {
        $currentDate = date('Y-m-d');
        if (is_null($formatter)) {
            return $currentDate;
        } else {
            return strtotime($currentDate);
        }
    }

    public static function getYear()
    {
        $currentDate = date('Y');
        return $currentDate;
    }

    public static function getMonth()
    {
        $currentDate = date('m');
        return $currentDate;
    }

    public static function getTime($formatter = null)
    {
        $currentTime = date('H:i:s');
        if (is_null($formatter)) {
            return $currentTime;
        } else {
            return strtotime($currentTime);
        }
    }

    public static function convertDate($date)
    {
        $month = date('m', strtotime($date));
        $day = date('d', strtotime($date));
        $year = date('Y', strtotime($date));
        return date("d F Y", mktime(0, 0, 0, $month, $day, $year));
    }

    public static function dateFormatExport($date)
    {
        $month = date('m', strtotime($date));
        $day = date('d', strtotime($date));
        $year = date('Y', strtotime($date));
        return $day.'/'.$month.'/'.$year;
    }

}
