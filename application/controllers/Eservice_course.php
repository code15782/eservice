<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Eservice_course extends CI_Controller
{
    public function index()
    {
        $user = $this->Global_model->select(
            'users',
            [
                ['id' => $this->session->userdata('id')]
            ]
        )->result();
        $courses = $this->Global_model->select(
            'courses',
            [
                ['courses.status !=' => 'delete'],
                $this->session->userdata('role') == 'staff' ? ['courses.section_id'=> $user[0]->section_id] : [],
            ],
            [
                ['table' => 'categories', 'condition' => 'categories.id = courses.category_id'],
                ['table' => 'semesters', 'condition' => 'semesters.id = courses.semester_id'],
                ['table' => 'subjects', 'condition' => 'subjects.id = courses.subject_id'],
                ['table' => 'sections', 'condition' => 'sections.id = courses.section_id'],
            ],
            '   courses.id, 
                courses.name as course_name,  
                subjects.code, 
                categories.name as categories_name,  
                subjects.name_thai as subject_name_thai, 
                semesters.term,
                semesters.year,
                sections.name as section_name,
            ',
            [
                'semesters.year DESC',
                'semesters.term DESC',
            ]
        )->result();

        output('Eservice_course/index', [
            'navbar_staff' => true,
            'courses' => $courses,
            'breadcrumbs' => [
                [
                    'path' => $this->session->userdata('role') == 'staff' ? 'Menu_staff/index' : 'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_course/index',
                    'title' => 'บริหารจัดการหลักสูตร'
                ]
            ]
        ], $this->session->userdata('id'));
    }

    public function new()
    {
        $user = $this->Global_model->select(
            'users',
            [
                ['id' => $this->session->userdata('id')]
            ]
        )->result();

        $section = $this->Global_model->select(
            'sections',
            [
                ['id' => $user[0]->section_id]
            ]
        )->result();

        $courses = $this->Global_model->select(
            'courses',
            [
                ['courses.status !=' => 'delete'],
                ['courses.section_id'=> $user[0]->section_id],
            ],
            [
                ['table' => 'categories', 'condition' => 'categories.id = courses.category_id'],
                ['table' => 'semesters', 'condition' => 'semesters.id = courses.semester_id'],
                ['table' => 'subjects', 'condition' => 'subjects.id = courses.subject_id'],
                ['table' => 'sections', 'condition' => 'sections.id = courses.section_id'],
            ],
            '   courses.id, 
                courses.name as course_name,  
                subjects.code, 
                categories.name as categories_name,  
                subjects.name_thai as subject_name_thai, 
                semesters.term,
                semesters.year,
                sections.name as section_name,
            ',
            [
                'semesters.year DESC',
                'semesters.term DESC',
            ]
        )->result();

        $categories = $this->Global_model->select(
            'categories',
            [
                ['categories.status !=' => 'delete'],
            ],
            [],
            '   categories.id,
                categories.name
            '
        )->result();

        $subjects = $this->Global_model->select(
            'subjects',
            [
                ['subjects.status !=' => 'delete'],
            ],
            [],
            '   subjects.id,
                subjects.name_thai
            '
        )->result();

        $semesters = $this->Global_model->select(
            'semesters',
            [
                ['semesters.status !=' => 'delete'],
            ],
            [],
            '   semesters.id,
                semesters.term,
                semesters.year
            '
        )->result();

        output('Eservice_course/new', [
            'navbar_staff' => true,
            'courses' => $courses,
            'breadcrumbs' => [
                [
                    'path' => $this->session->userdata('role') == 'staff' ? 'Menu_staff/index' : 'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_course/index',
                    'title' => 'บริหารจัดการหลักสูตร'
                ],
                [
                    'path' => 'Eservice_course/new',
                    'title' => 'เพิ่มหลักสูตร'
                ]
            ],
            'modal' => [
                'title' => 'เพิ่มหลักสูตรใหม่',
                'body' => $this->load->view('Eservice_course/new_modal', [
                    // it's also be a post url form
                    'path' => base_url('Eservice_course/add'),
                    'categories' => $categories,
                    'subjects' => $subjects,
                    'semesters' => $semesters,
                    'section' => $section,
                ], true),
                'confirm' => 'เพิ่ม',
                'cancel_url' => base_url('Eservice_course/index'),
                'cancel' => 'ยกเลิก',
            ]
        ], $this->session->userdata('id'));
    }

    public function edit($id)
    {
        $data = null;
        $user = $this->Global_model->select(
            'users',
            [
                ['id' => $this->session->userdata('id')]
            ]
        )->result();

        $section = $this->Global_model->select(
            'sections',
            [
                ['id' => $user[0]->section_id]
            ]
        )->result();

        $courses = $this->Global_model->select(
            'courses',
            [
                ['courses.status !=' => 'delete'],
            ],
            [
                ['table' => 'categories', 'condition' => 'categories.id = courses.category_id'],
                ['table' => 'semesters', 'condition' => 'semesters.id = courses.semester_id'],
                ['table' => 'subjects', 'condition' => 'subjects.id = courses.subject_id'],
                ['table' => 'sections', 'condition' => 'sections.id = courses.section_id'],
            ],
            '   courses.id, 
                courses.name as course_name,  
                subjects.id as subjects_id,
                subjects.code as subjects_code, 
                categories.id as categories_id,  
                categories.name as categories_name,  
                subjects.name_thai as subject_name_thai, 
                semesters.id as semesters_id,
                semesters.term,
                semesters.year as semesters_year,
                sections.name as section_name,
            ',
            [
                'semesters_year DESC',
                'semesters.term DESC',
            ]
        )->result();

        for ($i = 0; $i < count($courses); $i++) {
            if ($courses[$i]->id == $id) {
                $data = $courses[$i];
            }
        }

        $categories = $this->Global_model->select(
            'categories',
            [
                ['categories.status !=' => 'delete'],
            ],
            [],
            '   categories.id,
                categories.name
            '
        )->result();

        $subjects = $this->Global_model->select(
            'subjects',
            [
                ['subjects.status !=' => 'delete'],
            ],
            [],
            '   subjects.id,
                subjects.name_thai
            '
        )->result();

        $semesters = $this->Global_model->select(
            'semesters',
            [
                ['semesters.status !=' => 'delete'],
            ],
            [],
            '   semesters.id,
                semesters.term,
                semesters.year
            '
        )->result();

        output('Eservice_course/edit', [
            'navbar_staff' => true,
            'courses' => $courses,
            'breadcrumbs' => [
                [
                    'path' => $this->session->userdata('role') == 'staff' ? 'Menu_staff/index' : 'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_course/index',
                    'title' => 'บริหารจัดการหลักสูตร'
                ],
                [
                    'path' => 'Eservice_course/copy',
                    'title' => 'แก้ไขหลักสูตร'
                ]
            ],
            'modal' => [
                'title' => 'แก้ไขหลักสูตร',
                'body' => $this->load->view('Eservice_course/edit_modal', [
                    // it's also be a post url form
                    'path' => base_url('Eservice_course/update'),
                    'courses' => $data,
                    'categories' => $categories,
                    'subjects' => $subjects,
                    'semesters' => $semesters,
                    'section' => $section,
                ], true),
                'confirm' => 'แก้ไข',
                'cancel_url' => base_url('Eservice_course/index'),
                'cancel' => 'ยกเลิก',
            ]
        ], $this->session->userdata('id'));
    }

    public function copy($id)
    {
        $user = $this->Global_model->select(
            'users',
            [
                ['id' => $this->session->userdata('id')]
            ]
        )->result();

        $section = $this->Global_model->select(
            'sections',
            [
                ['id' => $user[0]->section_id]
            ]
        )->result();

        $data = null;
        $courses = $this->Global_model->select(
            'courses',
            [
                ['courses.status !=' => 'delete'],
                $this->session->userdata('role') == 'staff' ? ['courses.section_id'=> $user[0]->section_id] : [],
            ],
            [
                ['table' => 'categories', 'condition' => 'categories.id = courses.category_id'],
                ['table' => 'semesters', 'condition' => 'semesters.id = courses.semester_id'],
                ['table' => 'subjects', 'condition' => 'subjects.id = courses.subject_id'],
                ['table' => 'sections', 'condition' => 'sections.id = courses.section_id'],
            ],
            '   courses.id, 
                courses.name as course_name,  
                subjects.id as subjects_id,
                subjects.code as subjects_code, 
                categories.id as categories_id,  
                categories.name as categories_name,  
                subjects.name_thai as subject_name_thai, 
                semesters.id as semesters_id,
                semesters.term,
                semesters.year as semesters_year,
                sections.name as section_name,
            ',
            [
                'semesters_year DESC',
                'semesters.term DESC',
            ]
        )->result();

        for ($i = 0; $i < count($courses); $i++) {
            if ($courses[$i]->id == $id) {
                $data = $courses[$i];
            }
        }

        $categories = $this->Global_model->select(
            'categories',
            [
                ['categories.status !=' => 'delete'],
            ],
            [],
            '   categories.id,
                categories.name
            '
        )->result();

        $subjects = $this->Global_model->select(
            'subjects',
            [
                ['subjects.status !=' => 'delete'],
            ],
            [],
            '   subjects.id,
                subjects.name_thai
            '
        )->result();

        $semesters = $this->Global_model->select(
            'semesters',
            [
                ['semesters.status !=' => 'delete'],
            ],
            [],
            '   semesters.id,
                semesters.term,
                semesters.year
            '
        )->result();

        output('Eservice_course/copy', [
            'navbar_staff' => true,
            'courses' => $courses,
            'breadcrumbs' => [
                [
                    'path' => $this->session->userdata('role') == 'staff' ? 'Menu_staff/index' : 'Menu_admin/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_course/index',
                    'title' => 'บริหารจัดการหลักสูตร'
                ],
                [
                    'path' => 'Eservice_course/edit',
                    'title' => 'คัดลอกหลักสูตร'
                ]
            ],
            'modal' => [
                'title' => 'คัดลอกหลักสูตร',
                'body' => $this->load->view('Eservice_course/copy_modal', [
                    // it's also be a post url form
                    'path' => base_url('Eservice_course/add/is_copy'),
                    'courses' => $data,
                    'categories' => $categories,
                    'subjects' => $subjects,
                    'semesters' => $semesters,
                    'section' => $section,
                ], true),
                'confirm' => 'คัดลอก',
                'cancel_url' => base_url('Eservice_course/index'),
                'cancel' => 'ยกเลิก',
            ]
        ], $this->session->userdata('id'));
    }

    public function add($slug = '')
    {
        $courses = $this->input->post();
        $courses['created_by'] = $this->session->userdata('id');
        $courses['updated_by'] = $this->session->userdata('id');

        switch ($slug) {
            case 'is_copy':
                $alert_title = 'คัดลอกสำเร็จ';
                break;
            default:
                $alert_title = 'เพิ่มสำเร็จ';
                break;
        }

        $this->Global_model->insert('courses', $courses);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => $alert_title]);
        redirect(base_url('Eservice_course/index'), 'refresh');
    }

    public function update()
    {
        $courses = $this->input->post();
        $courses['updated_by'] = $this->session->userdata('id');
        $courses['updated_date'] = get_timestamp();

        $this->Global_model->update('courses', $courses, [['id' => $courses['id']]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'แก้ไขสำเร็จ']);
        redirect(base_url('Eservice_course/index'), 'refresh');
    }

    public function delete($id)
    {
        $courses['updated_by'] = $this->session->userdata('id');
        $courses['updated_date'] = get_timestamp();
        $courses['status'] = 'delete';

        $this->Global_model->update('courses', $courses, [['id' => $id]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'ลบสำเร็จ']);
        redirect(base_url('Eservice_course/index'), 'refresh');
    }
}

/* End of file Eservice_course.php */
