<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subject_staff extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->current_main = 'Subject_staff';
        if ($this->session->userdata('role') == 'admin') {
            $this->current_main = 'Menu_admin';
        }
    }

    public function index()
    {
        $subjects = $this->Global_model->select(
            'subjects',
            [
                ['subjects.status !=' => 'delete'],
            ]
        )->result();

        output('Subject_staff/index', [
            'navbar_staff' => true,
            'subjects' => $subjects,
            'breadcrumbs' => [
                [
                    'path' => $this->current_main. '/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_staff/index',
                    'title' => 'ตั้งค่าข้อมูลพื้นฐาน มคอ.'
                ],
                [
                    'path' => 'Subject_staff/index',
                    'title' => 'จัดการรายวิชา'
                ]
            ]
        ],$this->session->userdata('id'));
    }

    public function new()
    {
        $subjects = $this->Global_model->select(
            'subjects',
            [
                ['subjects.status !=' => 'delete'],
            ]
        )->result();

        output('Subject_staff/new', [
            'navbar_staff' => true,
            'subjects' => $subjects,
            'breadcrumbs' => [
                [
                    'path' => $this->current_main. 'Menu_staff/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_staff/index',
                    'title' => 'ตั้งค่าข้อมูลพื้นฐาน มคอ.'
                ],
                [
                    'path' => 'Subject_staff/index',
                    'title' => 'จัดการรายวิชา'
                ],
                [
                    'path' => 'Subject_staff/new',
                    'title' => 'เพิ่มรายวิชาใหม่'
                ]
            ],
            'modal' => [
                'title' => 'เพิ่มรายวิชาใหม่',
                'body' => $this->load->view('Subject_staff/new_modal', [
                    'path' => base_url('Subject_staff/add'),
                ], true),
                'confirm' => 'เพิ่ม',
                'cancel_url' => base_url('Subject_staff/index'),
                'cancel' => 'ยกเลิก',
            ]
        ],$this->session->userdata('id'));
    }

    public function edit($id)
    {
        $data = null;
        $subjects = $this->Global_model->select(
            'subjects',
            [
                ['subjects.status !=' => 'delete'],
            ]
        )->result();

        for ($i = 0; $i < count($subjects); $i++) {
            if ($subjects[$i]->id == $id) {
                $data = $subjects[$i];
            }
        }

        output('Subject_staff/edit', [
            'id' => $id,
            'navbar_staff' => true,
            'subjects' => $subjects,
            'breadcrumbs' => [
                [
                    'path' => $this->current_main. '/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_staff/index',
                    'title' => 'ตั้งค่าข้อมูลพื้นฐาน มคอ.'
                ],
                [
                    'path' => 'Subject_staff/index',
                    'title' => 'จัดการรายวิชา'
                ],
                [
                    'path' => 'Subject_staff/edit/' . $id,
                    'title' => 'แก้ไขรายวิชา'
                ]
            ],
            'modal' => [
                'title' => 'แก้ไขรายวิชา',
                'body' => $this->load->view('Subject_staff/edit_modal', [
                    'path' => base_url('Subject_staff/update'),
                    'subjects' => $data,
                ], true),
                'confirm' => 'แก้ไข',
                'cancel_url' => base_url('Subject_staff/index'),
                'cancel' => 'ยกเลิก',
            ]
        ],$this->session->userdata('id'));
    }


    public function add()
    {
        $subjects = $this->input->post();
        $subjects['created_by'] = $this->session->userdata('id');
        $subjects['updated_by'] = $this->session->userdata('id');

        $this->Global_model->insert('subjects', $subjects);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'เพิ่มสำเร็จ']);
        redirect(base_url($this->current_main. '/index'), 'refresh');
    }


    public function update()
    {
        $subjects = $this->input->post();
        $subjects['updated_by'] = $this->session->userdata('id');
        $subjects['updated_date'] = get_timestamp();

        $this->Global_model->update('subjects', $subjects, [['id' => $subjects['id']]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'แก้ไขสำเร็จ']);
        redirect(base_url($this->current_main. '/index'), 'refresh');
    }

    public function delete($id)
    {
        $subjects['updated_by'] = $this->session->userdata('id');
        $subjects['updated_date'] = get_timestamp();
        $subjects['status'] = 'delete';

        $this->Global_model->update('subjects', $subjects, [['id' => $id]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'ลบสำเร็จ']);
        redirect(base_url($this->current_main. '/index'), 'refresh');
    }
}

/* End of file Subject_staff.php */
