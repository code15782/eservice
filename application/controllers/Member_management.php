<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Member_management extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('authen_failed', 'โปรดลงชื่อในฐานะผู้ดูแลระบบ');
            redirect(base_url('Authen/index'));
        }
    }

    public function index()
    {
        $users = $this->Global_model->select(
            'users',
            [
                ['users.status !=' => 'delete']
            ],
            [
                ['table' => 'sections', 'condition' => 'sections.id = users.section_id', 'option_join' => 'left']
            ],
            '   users.id,
                users.username,
                users.prefixname,
                users.firstname,
                users.lastname,
                users.role,
                sections.name as name,
            '
        )->result();
        output('Member_management/index', [
            'navbar_admin' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Member_management/index',
                    'title' => 'บริหารจัดการสมาชิก'
                ]
            ],
            'users' => $users,
        ], $this->session->userdata('id'));
    }

    public function new()
    {
        $seciotns = $this->Global_model->select('sections', [['sections.status !=' => 'delete', 'sections.status !=' => 'inactive']])->result();
        output('Member_management/new', [
            'navbar_admin' => true,
            'sections'=> $seciotns,
        ], $this->session->userdata('id'));
    }

    public function edit($id)
    {
        $user = $this->Global_model->select('users', [['id' => $id]])->row();
        $seciotns = $this->Global_model->select('sections', [['sections.status !=' => 'delete', 'sections.status !=' => 'inactive']])->result();
        output('Member_management/edit', [
            'navbar_admin' => true,
            'user' => $user,
            'id' => $id,
            'sections' => $seciotns,
        ], $this->session->userdata('id'));
    }

    public function update($id)
    {
        $user = $this->input->post();
        if (trim($user['password']) != '') {
            $user['password'] = $this->bcrypt->hash_password($user['password']);
        } else {
            unset($user['password']);
        }
        unset($user['re_password']);
        $user['updated_by'] = $this->session->userdata('id');
        $user['updated_date'] = get_timestamp();
        $this->Global_model->update('users', $user, [['id' => $id]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'แก้ไขสำเร็จ']);
        redirect(base_url('Member_management/index'), 'refresh');
    }

    public function add()
    {
        $user = $this->input->post();
        if ($user['re_password'] == $user['password']) {
            unset($user['re_password']);
            $user['password'] = $this->bcrypt->hash_password($user['password']);
            $user['created_by'] = $this->session->userdata('id');
            $user['updated_by'] = $this->session->userdata('id');
            $this->Global_model->insert('users', $user);
            $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'เพิ่มสำเร็จ']);
        } else {
            $this->session->set_flashdata('alert', ['icon' => 'error', 'title' => 'รหัสผ่านไม่ตรงกัน']);
        }
        redirect(base_url('Member_management/index'), 'refresh');
    }

    public function delete($id)
    {
        $user['updated_by'] = $this->session->userdata('id');
        $user['updated_date'] = get_timestamp();
        $user['status'] = 'delete';
        $this->Global_model->update('users', $user, [['id' => $id]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'ลบสำเร็จ']);
        redirect(base_url('Member_management/index'), 'refresh');
    }
}

/* End of file Member_management.php */
