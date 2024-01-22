<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Eservice_group extends CI_Controller
{
    public function index()
    {
        $categories = $this->Global_model->select(
            'categories',
            [
                ['categories.status !=' => 'delete'],
            ]
        )->result();

        output('Eservice_group/index', [
            'navbar_staff' => true,
            'categories' => $categories,
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
                    'path' => 'Eservice_group/index',
                    'title' => 'จัดการหมวดหมู่ มคอ.'
                ]
            ]
        ],$this->session->userdata('id'));
    }

    public function new()
    {
        $categories = $this->Global_model->select(
            'categories',
            [
                ['categories.status !=' => 'delete'],
            ]
        )->result();

        output('Eservice_group/new', [
            'navbar_staff' => true,
            'categories' => $categories,
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
                    'path' => 'Eservice_group/index',
                    'title' => 'จัดการหมวดหมู่ มคอ'
                ],
                [
                    'path' => 'Eservice_group/new',
                    'title' => 'เพิ่มหมวดหมู่ มคอ'
                ]
            ],
            'modal' => [
                'title' => 'เพิ่มหมวดหมู่ มคอ.',
                'body' => $this->load->view('Eservice_group/new_modal', [
                    // it's also be a post url form
                    'path' => base_url('Eservice_group/add'),
                ], true),
                'confirm' => 'เพิ่ม',
                'cancel_url' => base_url('Eservice_group/index'),
                'cancel' => 'ยกเลิก',
            ]
        ],$this->session->userdata('id'));
    }

    public function add()
    {
        $categories = $this->input->post();
        $categories['created_by'] = $this->session->userdata('id');
        $categories['updated_by'] = $this->session->userdata('id');

        $this->Global_model->insert('categories', $categories);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'เพิ่มสำเร็จ']);
        redirect(base_url('Eservice_group/index'), 'refresh');
    }

    public function edit($id)
    {
        $data = null;
        $categories = $this->Global_model->select(
            'categories',
            [
                ['categories.status !=' => 'delete'],
            ]
        )->result();

        for ($i = 0; $i < count($categories); $i++) {
            if ($categories[$i]->id == $id) {
                $data = $categories[$i];
            }
        }

        output('Eservice_group/edit', [
            'navbar_staff' => true,
            'categories' => $categories,
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
                    'path' => 'Eservice_group/index',
                    'title' => 'จัดการหมวดหมู่ มคอ'
                ],
                [
                    'path' => 'Eservice_group/edit/' . $id,
                    'title' => 'แก้ไขหมวดหมู่ มคอ'
                ]
            ],
            'modal' => [
                'title' => 'แก้ไข มคอ..',
                'body' => $this->load->view('Eservice_group/edit_modal', [
                    'path' => base_url('Eservice_group/update'),
                    'categories' => $data,
                ], true),
                'confirm' => 'แก้ไข',
                'cancel_url' => base_url('Eservice_group/index'),
                'cancel' => 'ยกเลิก',
            ]
        ],$this->session->userdata('id'));
    }

    public function update()
    {
        $categories = $this->input->post();
        $categories['updated_by'] = $this->session->userdata('id');
        $categories['updated_date'] = get_timestamp();

        $this->Global_model->update('categories', $categories, [['id' => $categories['id']]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'แก้ไขสำเร็จ']);
        redirect(base_url('Eservice_group/index'), 'refresh');
    }

    public function delete($id)
    {
        $categories['updated_by'] = $this->session->userdata('id');
        $categories['updated_date'] = get_timestamp();
        $categories['status'] = 'delete';

        $this->Global_model->update('categories', $categories, [['id' => $id]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'ลบสำเร็จ']);
        redirect(base_url('Eservice_group/index'), 'refresh');
    }
}

/* End of file Eservice_group.php */
