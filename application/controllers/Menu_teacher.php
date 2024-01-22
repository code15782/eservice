<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu_teacher extends CI_Controller
{
    public function index()
    {
        output('Menu_teacher/index', [
            'navbar_teacher' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_teacher/index',
                    'title' => 'หน้าแรก'
                ]
            ]
        ],$this->session->userdata('id'));
    }
}

/* End of file Menu_teacher.php */
