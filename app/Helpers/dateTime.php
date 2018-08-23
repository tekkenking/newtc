<?php

use Carbon\Carbon;

if(! function_exists('icarbon')) {
    function icarbon($datetime = 'now'){
        return Carbon::parse($datetime);
    }
}

if(! function_exists('sqldate') ) {
    function sqldate($time = 'now'){
        $format = 'Y\-m\-d H\:i\:s';
        return icarbon($time)->format($format);
    }
}

if(! function_exists('diff_in')){
    function diff_in($type, $from, $to) {
        $diffType = 'diffIn'.$type;
        $diff = icarbon($from)->$diffType($to);
        return $diff;
    }
}