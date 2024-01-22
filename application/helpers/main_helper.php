<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function output($view, $data = [], $session = false)
{
    $ci = &get_instance();
    $data['base_url'] =  base_url();
    $data['body'] =  $view;
    if ($session !== false) {
        if ($session == null) {
            redirect(base_url() . 'Authen/index');
        }
    }
    $ci->load->view(
        'layouts/v_main',
        $data,
    );
}

function convert_member_role($role)
{
    if ($role == 'staff') {
        return  'เจ้าหน้าที่';
    } else if ($role == 'teacher') {
        return  'อาจารย์';
    } else {
        return 'ผู้ดูแลระบบ';
    }
}

function get_timestamp()
{
    date_default_timezone_set('asia/bangkok');
    return date('Y-m-d H:i:s');
}