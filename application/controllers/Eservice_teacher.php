<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Eservice_teacher extends CI_Controller
{
    public function index()
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
        )->row();

        $this->db->distinct();
        $menus = $this->Global_model->select(
            'categories', 
            [
                ['categories.status !=' => 'delete'],
                ['courses.status !=' => 'delete'],
                ['courses.section_id' => $section->id],
            ],
            [
                ['table' => 'courses', 'condition' => 'courses.category_id = categories.id',]
            ],
            '   categories.id,
                categories.name,
                courses.section_id as section_id,
            ',
            [
                'categories.name ASC',
            ]
        )->result();
        // var_dump($this->db->last_query());
        // die;
        // print_r($menus);

        output('Eservice_teacher/index', [
            'menus' => $menus,
            'navbar_teacher' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_teacher/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_teacher/index',
                    'title' => 'บริหารจัดการ มคอ.'
                ]
            ]
        ],$this->session->userdata('id'));
    }

    public function show($id)
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
                ['category_id' => $id],
                ['courses.status !=' => 'delete'],
                ['courses.section_id'=> $user[0]->section_id],
            ],
            [
                ['table' => 'categories', 'condition' => 'categories.id = courses.category_id'],
                ['table' => 'semesters', 'condition' => 'semesters.id = courses.semester_id'],
                ['table' => 'subjects', 'condition' => 'subjects.id = courses.subject_id'],
            ],
            '   courses.id , 
                courses.name as course_name ,  
                subjects.code , 
                subjects.name_thai as subject_name_thai , 
                subjects.name_english  as subject_name_english  , 
                subjects.unit , 
                subjects.time_theory , 
                subjects.time_lab , 
                subjects.time_research , 
                semesters.term,
                semesters.year
            ',
            [
                'semesters.year DESC',
                'semesters.term DESC',
            ]
        )->result();

        output('Eservice_teacher/show', [
            'last_show_id' => $id,
            'courses' => $courses,
            'navbar_teacher' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_teacher/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_teacher/index',
                    'title' => 'บริหารจัดการ มคอ.'
                ],
                [
                    'path' => 'Eservice_teacher/show/' . $id,
                    'title' => 'รายวิชาที่เกี่ยวข้อง'
                ]
            ]
        ],$this->session->userdata('id'));
    }

    public function add($id)
    {
        $enrolls = $this->Global_model->select(
            'enrolls',
            [
                ['created_by' => $this->session->userdata('id')],
                ['course_id' => $id],
                ['enrolls.status !=' => 'delete']
            ],
        );

        if (COUNT($enrolls->result()) == 0) {
            $enroll['course_id'] = $id;
            $enroll['created_by'] = $this->session->userdata('id');
            $enroll['updated_by'] = $this->session->userdata('id');
            $this->Global_model->insert('enrolls', $enroll);
            $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'เพิ่มสำเร็จ']);
        } else {
            $this->session->set_flashdata('alert', ['icon' => 'error', 'title' => 'ไม่สำเร็จ มีรายวิชานี้อยู่แล้ว']);
        }

        redirect(base_url('Eservice_teacher/show/' . $this->input->get('last_show_id')), 'refresh');
    }

    public function copy($id)
    {
        
        $enrolls = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete']
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


        $copy_enroll = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.id =' => $id]
            ],
            [
                ['table' => 'courses', 'condition' => 'courses.id = enrolls.course_id'],
                ['table' => 'categories', 'condition' => 'categories.id = courses.category_id'],
                ['table' => 'semesters', 'condition' => 'semesters.id = courses.semester_id'],
                ['table' => 'subjects', 'condition' => 'subjects.id = courses.subject_id'],
            ],
            '   enrolls.id , 
                courses.name as course_name ,  
                subjects.id as subject_id,
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
        )->result()[0];

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
        )->row();


        $course_by_copy_subjects = $this->Global_model->select(
            'courses',
            [
                ['courses.status !=' => 'delete'],
                ['subjects.id =' => $copy_enroll->subject_id],
                ['courses.section_id' => $section->id]
            ],
            [
                ['table' => 'categories', 'condition' => 'categories.id = courses.category_id'],
                ['table' => 'semesters', 'condition' => 'semesters.id = courses.semester_id'],
                ['table' => 'subjects', 'condition' => 'subjects.id = courses.subject_id'],
            ],
            '   courses.id , 
                courses.name as course_name ,  
                categories.name as category_name,
                subjects.id as subject_id,
                subjects.code , 
                subjects.name_thai as subject_name_thai , 
                subjects.name_english  as subject_name_english  , 
                subjects.unit , 
                subjects.time_theory , 
                subjects.time_lab , 
                subjects.time_research , 
                semesters.term,
                semesters.year
            ',
            [
                'semesters.year DESC',
                'semesters.term DESC',
            ]
        )->result();

        output('Eservice_teacher/copy', [
            'enrolls' => $enrolls,
            'navbar_teacher' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_teacher/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_teacher/list',
                    'title' => 'รายวิชาของฉัน'
                ],
                [
                    'path' => 'Eservice_teacher/copy/'.$id,
                    'title' => 'คัดลอก'
                ]
            ],
            'modal' => [
                'title' => 'คัดลอกไปยังปีการศึกษา (รายวิชา'.  $copy_enroll->subject_name_thai .')',
                'body' => $this->load->view('Eservice_teacher/copy_modal', [
                    'path' => base_url('Eservice_teacher/save_copy_modal'),
                    'copy_enroll'=> $copy_enroll,
                    'course_by_copy_subjects'=> $course_by_copy_subjects,
                ], true),
                'confirm' => 'เพิ่ม',
                'cancel_url' => base_url('Eservice_teacher/list'),
                'cancel' => 'ยกเลิก'
            ]
        ],$this->session->userdata('id'));
    }

    public function save_copy_modal()
    {
        $copy_enroll_id = $this->input->post('copy_enroll_id');
        $course_target_id = $this->input->post('course_target_id');

        if (empty($copy_enroll_id) || empty($course_target_id)) {
            $this->session->set_flashdata('alert', ['icon' => 'error', 'title' => 'เลือกข้อมูลให้ถูกต้อง']);
            return redirect(base_url('Eservice_teacher/list'), 'refresh');
        }

        $this->db->trans_begin();

        $enrolls = $this->Global_model->select(
            'enrolls',
            [
                ['created_by' => $this->session->userdata('id')],
                ['course_id' => $course_target_id],
                ['enrolls.status !=' => 'delete']
            ],
        );

        if (COUNT($enrolls->result()) != 0) {
            $this->session->set_flashdata('alert', ['icon' => 'error', 'title' => 'ไม่สำเร็จ มีรายวิชานี้อยู่แล้ว']);
            return redirect(base_url('Eservice_teacher/list'), 'refresh');
        }else{
            $enroll['course_id'] = $course_target_id;
            $enroll['created_by'] = $this->session->userdata('id');
            $enroll['updated_by'] = $this->session->userdata('id');
            $this->Global_model->insert('enrolls', $enroll);
            $insert_enroll_id = $this->db->insert_id();
        }

        $form_1_general = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['enrolls.id =' => $copy_enroll_id]
            ],
            [
                ['table' => 'courses', 'condition' => 'courses.id = enrolls.course_id'],
                ['table' => 'form_1_generals', 'condition' => 'form_1_generals.id = enrolls.form_1_generals_id'],
            ]
        )->row();

        $form_2_component = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['enrolls.id =' => $copy_enroll_id]
            ],
            [
                ['table' => 'courses', 'condition' => 'courses.id = enrolls.course_id'],
                ['table' => 'form_2_components', 'condition' => 'form_2_components.id = enrolls.form_2_components_id'],
            ]
        )->row();

        $form_3_elo_main = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['enrolls.id =' => $copy_enroll_id]
            ],
            [
                ['table' => 'courses', 'condition' => 'courses.id = enrolls.course_id'],
                ['table' => 'form_3_elo_mains', 'condition' => 'form_3_elo_mains.id = enrolls.form_3_elo_mains_id'],
            ]
        )->row();

        $form_4_plan_main = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['enrolls.id =' => $copy_enroll_id]
            ],
            [
                ['table' => 'courses', 'condition' => 'courses.id = enrolls.course_id'],
                ['table' => 'form_4_plan_mains', 'condition' => 'form_4_plan_mains.id = enrolls.form_4_plan_mains_id'],
            ]
        )->row();

        $form_5_resource = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['enrolls.id =' => $copy_enroll_id]
            ],
            [
                ['table' => 'courses', 'condition' => 'courses.id = enrolls.course_id'],
                ['table' => 'form_5_resources', 'condition' => 'form_5_resources.id = enrolls.form_5_resources_id'],
            ]
        )->row();

        $form_6_assesse = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['enrolls.id =' => $copy_enroll_id]
            ],
            [
                ['table' => 'courses', 'condition' => 'courses.id = enrolls.course_id'],
                ['table' => 'form_6_assesses', 'condition' => 'form_6_assesses.id = enrolls.form_6_assesses_id'],
            ]
        )->row();

        if (isset($form_1_general)) {
            $form_1_general = $this->Global_model->select(
                'form_1_generals',
                [
                    ['id =' => $form_1_general->id],
                ],
            )->row();
            unset($form_1_general->id);
            unset($form_1_general->updated_date);
            unset($form_1_general->created_date);
            $this->Global_model->insert('form_1_generals', $form_1_general);
            $this->Global_model->update('enrolls', ['form_1_generals_id'=> $this->db->insert_id()], [['id' => $insert_enroll_id ]]);
        }

        if (isset($form_2_component)) {
            $form_2_component = $this->Global_model->select(
                'form_2_components',
                [
                    ['id =' => $form_2_component->id],
                ],
            )->row();
            unset($form_2_component->id);
            unset($form_2_component->updated_date);
            unset($form_2_component->created_date);
            $this->Global_model->insert('form_2_components', $form_2_component);
            $this->Global_model->update('enrolls', ['form_2_components_id'=> $this->db->insert_id()], [['id' => $insert_enroll_id ]]);
        }

        if (isset($form_3_elo_main)) {
            $form_3_elo_main = $this->Global_model->select(
                'form_3_elo_mains',
                [
                    ['id =' => $form_3_elo_main->id],
                ],
            )->row();
            unset($form_3_elo_main->id);
            unset($form_3_elo_main->updated_date);
            unset($form_3_elo_main->created_date);
            $this->Global_model->insert('form_3_elo_mains', $form_3_elo_main);
            $this->Global_model->update('enrolls', ['form_3_elo_mains_id'=> $this->db->insert_id()], [['id' => $insert_enroll_id ]]);
        }

        if (isset($form_4_plan_main)) {
            $form_4_plan_main = $this->Global_model->select(
                'form_4_plan_mains',
                [
                    ['id =' => $form_4_plan_main->id],
                ],
            )->row();


            $form_4_plan_details = $this->Global_model->select(
                'form_4_plan_details',
                [
                    ['form_4_plan_main_id =' => $form_4_plan_main->id]
                ]
            )->result();

            unset($form_4_plan_main->id);
            unset($form_4_plan_main->updated_date);
            unset($form_4_plan_main->created_date);
            $this->Global_model->insert('form_4_plan_mains', $form_4_plan_main);
            $form_4_plan_main_id = $this->db->insert_id();
            foreach ($form_4_plan_details as $form_4_plan_detail) {
                unset($form_4_plan_detail->id);
                unset($form_4_plan_detail->updated_date);
                unset($form_4_plan_detail->created_date);
                $form_4_plan_detail->form_4_plan_main_id = $form_4_plan_main_id;
                $this->Global_model->insert('form_4_plan_details', $form_4_plan_detail);
            }
            $this->Global_model->update('enrolls', ['form_4_plan_mains_id'=> $form_4_plan_main_id], [['id' => $insert_enroll_id ]]);
        }

        if (isset($form_5_resource)) {
            $form_5_resource = $this->Global_model->select(
                'form_5_resources',
                [
                    ['id =' => $form_5_resource->id],
                ],
            )->row();
            unset($form_5_resource->id);
            unset($form_5_resource->updated_date);
            unset($form_5_resource->created_date);
            $this->Global_model->insert('form_5_resources', $form_5_resource);
            $this->Global_model->update('enrolls', ['form_5_resources_id'=> $this->db->insert_id()], [['id' => $insert_enroll_id ]]);
        }

        if (isset($form_6_assesses)) {
            $form_6_assesses = $this->Global_model->select(
                'form_6_assesses',
                [
                    ['id =' => $form_6_assesses->id],
                ],
            )->row();
            unset($form_6_assesses->id);
            unset($form_6_assesses->updated_date);
            unset($form_6_assesses->created_date);
            $this->Global_model->insert('form_6_assesses', $form_6_assesses);
            $this->Global_model->update('enrolls', ['form_6_assesses_id'=> $this->db->insert_id()], [['id' => $insert_enroll_id ]]);
        }


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('alert', ['icon' => 'error', 'title' => 'เกิดข้อผิดพลาด']);
        }else{
            $this->db->trans_commit();
            $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'บันทึกสำเร็จ']);
        }


        redirect(base_url('Eservice_teacher/list'), 'refresh');

    }

    public function list()
    {
        $enrolls = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete']
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

        output('Eservice_teacher/list', [
            'enrolls' => $enrolls,
            'navbar_teacher' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_teacher/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_teacher/list',
                    'title' => 'รายวิชาของฉัน.'
                ]
            ]
        ],$this->session->userdata('id'));
    }

    public function delete($id)
    {
        $enroll['updated_by'] = $this->session->userdata('id');
        $enroll['updated_date'] = get_timestamp();
        $enroll['status'] = 'delete';
        $this->Global_model->update('enrolls', $enroll, [['id' => $id]]);
        $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'ลบสำเร็จ']);
        redirect(base_url('Eservice_teacher/list'), 'refresh');
    }
}

/* End of file Eservice_teacher.php */
