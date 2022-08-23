<?php

if (!function_exists('isLogin')) {

    function isLogin() {
        $CI =&get_instance();
        $CI->load->library('session');
        if ( $CI->session->has_userdata('userdata')) {
            return true;
        }
        return false;
    }
}
