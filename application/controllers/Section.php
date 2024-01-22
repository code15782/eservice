<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('authen_failed', 'โปรดลงชื่อในฐานะผู้ดูแลระบบ');
            redirect(base_url('Authen/index'));
        }
    }

    public function index()
    {
        $sections = $this->Global_model->select('sections', [['status !=' => 'delete']])->result();
        output('Section/index', [
            'navbar_admin' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Section/index',
                    'title' => 'ตั้งค่าข้อมูลภาค'
                ]
            ],
            'sections' => $sections,
        ], $this->session->userdata('id'));
    }

    public function new()
    {
        $sections = $this->Global_model->select('sections', [['status !=' => 'delete']])->result();
        output('Section/new', [
            'navbar_admin' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Section/index',
                    'title' => 'ตั้งค่าข้อมูลภาค'
                ],                [
                    'path' => 'Section/new',
                    'title' => 'เพิ่มภาค'
                ]
            ],
            'sections' => $sections,
            'modal' => [
                'title' => 'เพิ่มภาคใหม่',
                'body' => $this->load->view('Section/new_modal', [
                    // it's also be a post url form
                    'path' => base_url('Section/add'),
                    'sections' => $sections,
                ], true),
                'confirm' => 'เพิ่ม',
                'cancel_url' => base_url('Section/index'),
                'cancel' => 'ยกเลิก',
            ]
        ], $this->session->userdata('id'));
    }

    public function add()
    {
        $sections = $this->input->post();
        $sections['created_by'] = $this->session->userdata('id');
        $sections['updated_by'] = $this->session->userdata('id');
        $this->Global_model->insert('sections', $sections);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => $alert_title ]);
        redirect(base_url('Section/index'), 'refresh');
    }

    public function edit($id)
    {
        $data = null;
        $sections = $this->Global_model->select('sections', [['status !=' => 'delete']])->result();

        for ($i = 0; $i < count($sections); $i++) {
            if ($sections[$i]->id == $id) {
                $data = $sections[$i];
            }
        }

        output('Section/edit', [
            'navbar_admin' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Section/index',
                    'title' => 'ตั้งค่าข้อมูลภาค'
                ],                [
                    'path' => 'Section/edit',
                    'title' => 'แก้ไขภาค'
                ]
            ],
            'sections' => $sections,
            'modal' => [
                'title' => 'แก้ไขภาค',
                'body' => $this->load->view('Section/edit_modal', [
                    // it's also be a post url form
                    'path' => base_url('Section/update'),
                    'sections' => $data,
                ], true),
                'confirm' => 'แก้ไข',
                'cancel_url' => base_url('Section/index'),
                'cancel' => 'ยกเลิก',
            ]
        ], $this->session->userdata('id'));
    }

    public function update()
    {
        $sections = $this->input->post();
        $sections['updated_by'] = $this->session->userdata('id');
        $sections['updated_date'] = get_timestamp();

        $this->Global_model->update('sections', $sections, [['id' => $sections['id']]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'แก้ไขสำเร็จ']);
        redirect(base_url('Section/index'), 'refresh');
    }

    public function delete($id)
    {
        $sections['updated_by'] = $this->session->userdata('id');
        $sections['updated_date'] = get_timestamp();
        $sections['status'] = 'delete';

        $this->Global_model->update('sections', $sections, [['id' => $id]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'ลบสำเร็จ']);
        redirect(base_url('Section/index'), 'refresh');
    }

}