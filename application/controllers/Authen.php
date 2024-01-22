<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Authen extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('role') == 'admin') {
            redirect(base_url('Menu_admin/index'));
        } else if ($this->session->userdata('role') == 'teacher') {
            redirect(base_url('Menu_teacher/index'));
        } else if ($this->session->userdata('role') == 'staff') {
            redirect(base_url('Menu_staff/index'));
        } else {
            output('Authen/index', [
                'no_body_class' => true
            ]);
        }
    }

    public function login()
    {
        $user = $this->Global_model->select(
            'users',
            [
                ['username' => $this->input->post('username')],
                ['status' => 'active']
            ]
        )->row();
        if (isset($user)) {
            if ($this->bcrypt->check_password($this->input->post('password'), $user->password)) {
                $this->session->set_userdata('id', $user->id);
                $this->session->set_userdata('role', $user->role);
                $this->session->set_userdata('username', $user->username);
                $this->session->set_userdata('fullname', $user->firstname . ' ' . $user->lastname);
                redirect(base_url('Authen/index'));
            }
        }
        $this->session->set_flashdata('authen_failed', 'โปรดตรวจสอบข้อมูล');
        redirect(base_url('Authen/index'));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Authen/index'));
    }
}

/* End of file Authen.php */
