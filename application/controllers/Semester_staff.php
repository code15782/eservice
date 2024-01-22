<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Semester_staff extends CI_Controller
{
    // order : output[navbar,breadcrumbs],[modal **optional]
    public function index()
    {
        $semesters = $this->Global_model->select(
            'semesters',
            [
                ['semesters.status !=' => 'delete'],
            ]
        )->result();

        output('Semester_staff/index', [
            'navbar_staff' => true,
            'semesters' => $semesters,
            'breadcrumbs' => [
                [
                    'path' => $this->session->userdata('role') == 'staff'?'Menu_staff/index':'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_staff/index',
                    'title' => 'ตั้งค่าข้อมูลพื้นฐาน มคอ.'
                ],
                [
                    'path' => 'Semester_staff/index',
                    'title' => 'จัดการปีการศึกษา'
                ]
            ]
        ],$this->session->userdata('id'));
    }

    public function new()
    {
        $semesters = $this->Global_model->select(
            'semesters',
            [
                ['semesters.status !=' => 'delete'],
            ]
        )->result();

        output('Semester_staff/new', [
            'navbar_staff' => true,
            'semesters' => $semesters,
            'breadcrumbs' => [
                [
                    'path' => $this->session->userdata('role') == 'staff'?'Menu_staff/index':'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_staff/index',
                    'title' => 'ตั้งค่าข้อมูลพื้นฐาน มคอ.'
                ],
                [
                    'path' => 'Semester_staff/index',
                    'title' => 'จัดการปีการศึกษา'
                ],
                [
                    'path' => 'Semester_staff/new',
                    'title' => 'เพิ่มปีการศึกษาใหม่'
                ]
            ],
            'modal' => [
                'title' => 'เพิ่มปีการศึกษาใหม่',
                'body' => $this->load->view('Semester_staff/new_modal', [
                    // it's also be a post url form
                    'path' => base_url('Semester_staff/add'),
                ], true),
                'confirm' => 'เพิ่ม',
                'cancel_url' => base_url('Semester_staff/index'),
                'cancel' => 'ยกเลิก',
            ]
        ],$this->session->userdata('id'));
    }

    public function edit($id)
    {
        $data = null;
        $semesters = $this->Global_model->select(
            'semesters',
            [
                ['semesters.status !=' => 'delete'],
            ]
        )->result();

        for ($i = 0; $i < count($semesters); $i++) {
            if ($semesters[$i]->id == $id) {
                $data = $semesters[$i];
            }
        }

        output('Semester_staff/edit', [
            'navbar_staff' => true,
            'semesters' => $semesters,
            'breadcrumbs' => [
                [
                    'path' => $this->session->userdata('role') == 'staff'?'Menu_staff/index':'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_staff/index',
                    'title' => 'ตั้งค่าข้อมูลพื้นฐาน มคอ.'
                ],
                [
                    'path' => 'Semester_staff/index',
                    'title' => 'จัดการปีการศึกษา'
                ],
                [
                    'path' => 'Semester_staff/edit/' . $id,
                    'title' => 'แก้ไขปีการศึกษา'
                ]
            ],
            'modal' => [
                'title' => 'แก้ไขปีการศึกษา',
                'body' => $this->load->view('Semester_staff/edit_modal', [
                    // it's also be a post url form
                    'path' => base_url('Semester_staff/update'),
                    'semesters' => $data,
                ], true),
                'confirm' => 'แก้ไข',
                'cancel_url' => base_url('Semester_staff/index'),
                'cancel' => 'ยกเลิก',
            ]
        ],$this->session->userdata('id'));
    }

    public function add()
    {
        $semester = $this->input->post();
        $semester['created_by'] = $this->session->userdata('id');
        $semester['updated_by'] = $this->session->userdata('id');

        $this->Global_model->insert('semesters', $semester);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'เพิ่มสำเร็จ']);
        redirect(base_url('Semester_staff/index'), 'refresh');
    }

    public function update()
    {
        $semester = $this->input->post();
        $semester['updated_by'] = $this->session->userdata('id');
        $semester['updated_date'] = get_timestamp();

        $this->Global_model->update('semesters', $semester, [['id' => $semester['id']]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'แก้ไขสำเร็จ']);
        redirect(base_url('Semester_staff/index'), 'refresh');
    }

    public function delete($id)
    {
        $semester['updated_by'] = $this->session->userdata('id');
        $semester['updated_date'] = get_timestamp();
        $semester['status'] = 'delete';

        $this->Global_model->update('semesters', $semester, [['id' => $id]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'ลบสำเร็จ']);
        redirect(base_url('Semester_staff/index'), 'refresh');
    }
}

/* End of file Semester_staff.php */
