<?php

/*
 * --------------------------------------------------------------------
 * Used to extract character type specified from a string
 * --------------------------------------------------------------------
 * Accepts three parameters.
 * First two a required. Third is optional
 * First [string]: the string of characters to extract from
 * Second [array]: Array of Extraction type
 * Third [string]: The string to replace the match
 * Forth [bool]: Wether to extract all matched or first matched
 * E.g
	Text: extract_char('dhfgd83ks0&9%*^', array('text'), TRUE);
 *
 */

if( ! function_exists('extract_char')){
    //Please do not parse in float and INT as you'd get unexpected result
    function extract_char($string='', Array $type=null, $rep='', $single=false)
    {
        if( $string == ''){
            trigger_error(__FUNCTION__ . ' Requires 1 string parameter', E_USER_WARNING);
            return false;
        }

        $allowedTypes = array(	'float'		=>	'([\d]+\.[\d]+)|',
            'int'		=>	'([\d]+)|',
            'text'		=>	'([a-zA-Z \s \.]+)|',
            'symbol'	=> 	'([^\s\t0-9a-zA-Z])|',
            'symbol2'	=>	'([\_\-\@])',
            'html_tag'	=> 	'(<[^<>]+>)|',
            'unformat_money' => '([0-9\.-]+)'
        );
        $allowedkey = $type == null ? array('text') : $type;

        $types = '';
        foreach( $allowedkey as $key ){
            $key = strtolower($key);
            if( isset($allowedTypes[$key]) ){
                $types .= $allowedTypes[$key];
            }else{
                trigger_error($type . ': [' . $key . '] is not allowed. text is assumed', E_USER_NOTICE);
                $types .= $allowedTypes['text'];
            }
        }

        if( $rep != '' ){
            $result = preg_replace("/$types/", $rep, $string);
        }else{
            if( $single == true ){
                preg_match("/$types/", $string, $match);
            }else{
                preg_match_all("/$types/", $string, $match);
            }

            $result = implode('', $match[0]);
        }

        return $result;

    }
}

if( ! function_exists('tt')){
    function tt($msg, $continue = false){
        ($continue) ? dump($msg) : dd($msg);
    }
}


/**
 * @param int $len
 * @param array $param
 *  return string - token;
 */
if( ! function_exists('generate_token') ){
    function generate_token($len = 8, $param = null) {

        $token = strtoupper(str_random($len));
        if($param) {
            $field = 'token';
            $model = $param;
            if(is_array($param)) {
                $model = $param[0];
                $field = $param[1];
            }

            do{
                $token = strtoupper(str_random($len));
            }while($model->where($field, $token)->first(['id']));

        }

        return $token;
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


//Return Currency Logo
if( ! function_exists('currency') ){
    function currency($code=false){
        return ($code) ? 'NGN' : '₦';
    }
}

if(! function_exists('format_num')){
    function format_num($num, $dec_places=2, $dec_symbol='.', $thousand_group=''){
        return number_format((float)$num, $dec_places, $dec_symbol, $thousand_group);
    }
}

//This would format the currency to money format
if(! function_exists('format_money')){
    function format_money($num, $kobo=false){
        $num = ($num > 0) ? $num : 0;

        $dec = ($kobo) ? 2 : 0;

        return format_num($num, $dec, '.', ',');
    }
}

if(! function_exists('format_currency')){
    function format_currency($num, $kobo=false, $currency_code=false){
        $cur = currency($currency_code);
        $money = format_money($num, $kobo);
        //tt($money, true);
        return $cur.$money;
    }
}

//This would refine the currency figure to 2 decimal figure
if(! function_exists('unformat_money') ){
    function unformat_money($money=0.00){
        return format_num(extract_char($money, array('unformat_money')));
    }
}

if(! function_exists('uroot_str')) {
    function uroot_str() {
        return 'uroot';
    }
}

if(! function_exists('tc_str')) {
    function tc_str() {
        return 'tc';
    }
}

if(! function_exists('agency_str')) {
    function agency_str() {
        return 'agency';
    }
}

if(! function_exists('customer_str')) {
    function customer_str() {
        return 'customer';
    }
}

if(! function_exists('governor_str')) {
    function governor_str() {
        return 'governor';
    }
}

if(! function_exists('sitename')) {
    function sitename(){
        return __('general.sitename');
    }
}

if(! function_exists('prepare_morph_url')) {
    function prepare_morph_url() {
        $url = user()->profile_type;
        return ($url == uroot_str()) ? tc_str() : $url;
    }
}

if(! function_exists('user')) {
    function user($guard = null) {
        $guard = ($guard) ? $guard : config('auth.defaults.guard');
        return auth($guard)->user();
    }
}

if(! function_exists('is_menu_active')) {
    function is_menu_active($link) {
        return request()->fullUrl() === $link ? 'active' : 'not-active';
    }
}

if(! function_exists('prepare_href')) {
    function prepare_href($menu) {
        return (isset($menu['link']) && $menu['link'] !== '#')
            ? route($menu['link'])
            : '#';
    }
}

if(! function_exists('config_get_menu')) {
    function config_get_menu($key) {
        return config('menu.'.$key.'.mainmenu');
    }
}

if( ! function_exists('can_user')) {
    function can_user($permission) {
        return (auth()->check() && (user()->can($permission) || user()->profile_type == 'uroot'))
            ? true
            : false;
    }
}