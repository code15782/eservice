<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Eservice_staff extends CI_Controller
{
    public function index()
    {
        output('Eservice_staff/index', [
            'navbar_staff' => true,
            'breadcrumbs' => [
                [
                    'path' => $this->session->userdata('role') == 'staff'?'Menu_staff/index':'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_staff/index',
                    'title' => 'ตั้งค่าข้อมูลพื้นฐาน มคอ.'
                ]
            ]
        ],$this->session->userdata('id'));
    }
    
}

/* End of file Eservice_staff.php */
