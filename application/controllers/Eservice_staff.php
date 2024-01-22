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
    
        
    public function list()
    {
        $current_user = $this->Global_model->select(
            'users',
            [
                ['users.id' => $this->session->userdata('id')],
            ],
        )->row();

        // $this->session->userdata('id')
        $enrolls = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['courses.section_id =' => $current_user->section_id]
            ],
            [   
                ['table' => 'courses', 'condition' => 'courses.id = enrolls.course_id'],
                ['table' => 'categories', 'condition' => 'categories.id = courses.category_id'],
                ['table' => 'semesters', 'condition' => 'semesters.id = courses.semester_id'],
                ['table' => 'subjects', 'condition' => 'subjects.id = courses.subject_id'],
            ],
            '   enrolls.id , 
                courses.name as course_name ,  
                subjects.code , 
                subjects.name_thai as subject_name_thai , 
                subjects.name_english  as subject_name_english  , 
                subjects.unit , 
                subjects.time_theory , 
                subjects.time_lab , 
                subjects.time_research , 
                semesters.term,
                semesters.year,
                categories.name as categorie_name
            ',
            [
                'semesters.year DESC',
                'semesters.term DESC',
            ]
        )->result();

        output('Eservice_Staff/list', [
            'enrolls' => $enrolls,
            'navbar_staff' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_staff/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_staff/list',
                    'title' => 'รายวิชาภายในภาค'
                ]
            ]
        ],$this->session->userdata('id'));
    }
}

/* End of file Eservice_staff.php */
