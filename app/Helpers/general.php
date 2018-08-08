<?php

if( ! function_exists('generate_token') ){
    function generate_token($len = 6) {
        return str_random($len);
    }
}