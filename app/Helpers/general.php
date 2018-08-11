<?php

if( ! function_exists('generate_token') ){
    function generate_token($len = 6) {
        return strtoupper(str_random($len));
    }
}