<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu_admin extends CI_Controller
{
    public function index()
    {
        output('Menu_admin/index', [
            'navbar_admin' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ]
            ]
        ],$this->session->userdata('id'));
    }
}

/* End of file Menu_admin.php */
