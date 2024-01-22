<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu_staff extends CI_Controller
{
    public function index()
    {
        output('Menu_staff/index', [
            'navbar_staff' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_staff/index',
                    'title' => 'หน้าแรก'
                ]
            ]
        ],$this->session->userdata('id'));
    }


}

/* End of file Menu_staff.php */
