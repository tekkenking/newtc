<?php

if( ! function_exists('generate_token') ){
    function generate_token($len = 6) {
        return strtoupper(str_random($len));
    }
}

if(! function_exists('activitylog') ){
    function activitylog($section, $action, $subject) {
        $request = request();
        $log = [];
        $log['section'] = $section;
        $log['subject'] = $action.':: '.$subject;
        $log['url'] = $request->fullUrl();
        $log['method'] = $request->method();
        $log['ip'] = $request->ip();
        $log['agent'] = $request->header('user-agent');
        $log['user_id'] = auth()->check() ? auth()->user()->id : 0;

        $logModel = new \App\Http\Repos\ActivitylogRepo();
        $logModel->create($log);
    }
}

if( ! function_exists('customer_log')) {
    function customer_log($action, $subject) {
        activitylog('customer', $action, $subject);
    }
}

if( ! function_exists('agency_log')) {
    function agency_log($action, $subject) {
        activitylog('agency', $action,  $subject);
    }
}

if( ! function_exists('tc_log')) {
    function tc_log($action, $subject) {
        activitylog('tracology',$action,  $subject);
    }
}