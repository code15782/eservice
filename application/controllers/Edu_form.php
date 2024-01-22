<?php defined('BASEPATH') or exit('No direct script access allowed');
class Edu_form extends CI_Controller
{
    public function index($id)
    {
        $enroll = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['enrolls.id =' => $id]
            ],
            [
                ['table' => 'courses', 'condition' => 'courses.id = enrolls.course_id'],
                ['table' => 'categories', 'condition' => 'categories.id = courses.category_id'],
                ['table' => 'semesters', 'condition' => 'semesters.id = courses.semester_id'],
                ['table' => 'subjects', 'condition' => 'subjects.id = courses.subject_id'],
            ],
            '   
                semesters.year ,
                semesters.term ,
                courses.name as course_name ,  
                subjects.code , 
                subjects.name_thai as subject_name_thai , 
                subjects.name_english  as subject_name_english  , 
                subjects.unit , 
                subjects.time_theory , 
                subjects.time_lab , 
                subjects.time_research , 
                semesters.id,
                semesters.term,
                semesters.year
            '
        )->row();

        $form_1_general = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['enrolls.id =' => $id]
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
                ['enrolls.id =' => $id]
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
                ['enrolls.id =' => $id]
            ],
            [
                ['table' => 'courses', 'condition' => 'courses.id = enrolls.course_id'],
                ['table' => 'form_3_elo_mains', 'condition' => 'form_3_elo_mains.id = enrolls.form_3_elo_mains_id'],
            ]
        )->row();

        $form_4_plan = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['enrolls.id =' => $id]
            ],
            [
                ['table' => 'courses', 'condition' => 'courses.id = enrolls.course_id'],
                ['table' => 'form_4_plan_mains', 'condition' => 'form_4_plan_mains.id = enrolls.form_4_plan_mains_id'],
                ['table' => 'form_4_plan_details', 'condition' => 'form_4_plan_details.form_4_plan_main_id = form_4_plan_mains.id'],
            ]
        )->result();

        $form_5_resource = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['enrolls.id =' => $id]
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
                ['enrolls.id =' => $id]
            ],
            [
                ['table' => 'courses', 'condition' => 'courses.id = enrolls.course_id'],
                ['table' => 'form_6_assesses', 'condition' => 'form_6_assesses.id = enrolls.form_6_assesses_id'],
            ]
        )->row();

        output('Edu_form/index', [
            'enroll' => $enroll,
            'enroll_id' => $id,
            'form_1_general' => $form_1_general,
            'form_2_component' => $form_2_component,
            'form_3_elo_main' => $form_3_elo_main,
            'form_4_plan' => $form_4_plan,
            'form_5_resource' => $form_5_resource,
            'form_6_assesse' => $form_6_assesse,
            'navbar_teacher' => true,
            'breadcrumbs' => [
                [
                    'path' => 'Menu_teacher/index',
                    'title' => 'หน้าแรก'
                ],
                [
                    'path' => 'Eservice_teacher/list',
                    'title' => 'รายวิชาของฉัน.'
                ],
                [
                    'path' => 'Edu_form/index/' . $id,
                    'title' => 'แก้ไขรายวิชาของฉัน.'
                ]
            ]
        ], $this->session->userdata('id'));
    }

    public function save($enroll_id, $name_form)
    {
        $form = $this->input->post();

        $enroll = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['enrolls.id =' => $enroll_id]
            ],
            [
                ['table' => $name_form, 'condition' => $name_form . '.id = enrolls.' . $name_form . '_id'],
            ]
        )->row();

        $this->db->trans_begin();

        if ($enroll) {
            $form['updated_by'] = $this->session->userdata('id');
            $form['updated_date'] = get_timestamp();
            $prop = $name_form . '_id';
            $this->Global_model->update($name_form, $form, [['id' => $enroll->$prop]]);
        } else {

            $form['created_by'] = $this->session->userdata('id');
            $form['updated_by'] = $this->session->userdata('id');
            $this->Global_model->insert($name_form, $form);

            $enroll['updated_by'] = $this->session->userdata('id');
            $enroll['updated_date'] = get_timestamp();
            $prop = $name_form . '_id';
            $enroll[$prop] = $this->db->insert_id();
            $this->Global_model->update('enrolls', $enroll, [['id' => $enroll_id]]);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('alert', ['icon' => 'error', 'title' => 'เกิดข้อผิดพลาด']);
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'บันทึกสำเร็จ']);
        }
        redirect(base_url('Edu_form/index/' . $enroll_id), 'refresh');
    }

    public function save_tab4($enroll_id)
    {
        $form_mains = $this->input->post();
        $form_details = $this->input->post();
        unset($form_mains['week']);
        unset($form_mains['title']);
        unset($form_mains['time']);
        unset($form_mains['activity_1']);
        unset($form_mains['activity_2']);
        unset($form_mains['clo1']);
        unset($form_mains['clo2']);
        unset($form_mains['clo3']);
        unset($form_mains['clo4']);
        unset($form_mains['clo5']);
        unset($form_mains['clo6']);
        unset($form_details['percent_1']);
        unset($form_details['percent_2']);
        unset($form_details['percent_3']);
        unset($form_details['percent_4']);

        $enroll = $this->Global_model->select(
            'enrolls',
            [
                ['enrolls.status !=' => 'delete'],
                ['enrolls.id =' => $enroll_id]
            ],
            [
                ['table' => 'form_4_plan_mains', 'condition' => 'form_4_plan_mains.id = enrolls.form_4_plan_mains_id'],
            ]
        )->row();

        $this->db->trans_begin();

        if ($enroll) {
            $form_mains['updated_by'] = $this->session->userdata('id');
            $form_mains['updated_date'] = get_timestamp();
            $this->Global_model->update('form_4_plan_mains', $form_mains, [['id' => $enroll->form_4_plan_mains_id]]);

            for ($i = 0; $i < 20; $i++) {
                $form_update['week'] = $form_details['week'][$i];
                $form_update['title'] = $form_details['title'][$i];
                $form_update['time'] = $form_details['time'][$i];
                $form_update['activity_1'] = $form_details['activity_1'][$i];
                $form_update['activity_2'] = $form_details['activity_2'][$i];
                $form_update['created_by'] = $this->session->userdata('id');
                $form_update['updated_by'] = $this->session->userdata('id');
                if (isset($form_details['clo1'][$i])) {
                    $form_update['clo1'] = $form_details['clo1'][$i] == 'active' ? 'active' : 'inactive';
                } else {
                    $form_update['clo1'] =  'inactive';
                }
                if (isset($form_details['clo2'][$i])) {
                    $form_update['clo2'] = $form_details['clo2'][$i] == 'active' ? 'active' : 'inactive';
                } else {
                    $form_update['clo2'] =  'inactive';
                }
                if (isset($form_details['clo3'][$i])) {
                    $form_update['clo3'] = $form_details['clo3'][$i] == 'active' ? 'active' : 'inactive';
                } else {
                    $form_update['clo3'] =  'inactive';
                }
                if (isset($form_details['clo4'][$i])) {
                    $form_update['clo4'] = $form_details['clo4'][$i] == 'active' ? 'active' : 'inactive';
                } else {
                    $form_update['clo4'] =  'inactive';
                }
                if (isset($form_details['clo5'][$i])) {
                    $form_update['clo5'] = $form_details['clo5'][$i] == 'active' ? 'active' : 'inactive';
                } else {
                    $form_update['clo5'] =  'inactive';
                }
                if (isset($form_details['clo6'][$i])) {
                    $form_update['clo6'] = $form_details['clo6'][$i] == 'active' ? 'active' : 'inactive';
                } else {
                    $form_update['clo6'] =  'inactive';
                }

                $this->Global_model->update('form_4_plan_details', $form_update, [['form_4_plan_main_id' => $enroll->form_4_plan_mains_id], ['week' => $form_update['week']]]);
            }
        } else {
            $form_mains['created_by'] = $this->session->userdata('id');
            $form_mains['updated_by'] = $this->session->userdata('id');
            $this->Global_model->insert('form_4_plan_mains', $form_mains);

            $form_4_plan_main_id = $this->db->insert_id();

            for ($i = 0; $i < 20; $i++) {
                $form_insert['form_4_plan_main_id'] = $form_4_plan_main_id;
                $form_insert['week'] = $form_details['week'][$i];
                $form_insert['title'] = $form_details['title'][$i];
                $form_insert['time'] = $form_details['time'][$i];
                $form_insert['activity_1'] = $form_details['activity_1'][$i];
                $form_insert['activity_2'] = $form_details['activity_2'][$i];
                $form_insert['created_by'] = $this->session->userdata('id');
                $form_insert['updated_by'] = $this->session->userdata('id');
                if (isset($form_details['clo1'][$i])) {
                    $form_insert['clo1'] = $form_details['clo1'][$i];
                }
                if (isset($form_details['clo2'][$i])) {
                    $form_insert['clo2'] = $form_details['clo2'][$i];
                }
                if (isset($form_details['clo3'][$i])) {
                    $form_insert['clo3'] = $form_details['clo3'][$i];
                }
                if (isset($form_details['clo4'][$i])) {
                    $form_insert['clo4'] = $form_details['clo4'][$i];
                }
                if (isset($form_details['clo5'][$i])) {
                    $form_insert['clo5'] = $form_details['clo5'][$i];
                }
                if (isset($form_details['clo6'][$i])) {
                    $form_insert['clo6'] = $form_details['clo6'][$i];
                }

                $form_mains['created_by'] = $this->session->userdata('id');
                $form_mains['updated_by'] = $this->session->userdata('id');
                $this->Global_model->insert('form_4_plan_details', $form_insert);
            }

            $enroll['updated_by'] = $this->session->userdata('id');
            $enroll['updated_date'] = get_timestamp();
            $enroll['form_4_plan_mains_id'] = $form_4_plan_main_id;
            $this->Global_model->update('enrolls', $enroll, [['id' => $enroll_id]]);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('alert', ['icon' => 'error', 'title' => 'เกิดข้อผิดพลาด']);
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('alert', ['icon' => 'success', 'title' => 'บันทึกสำเร็จ']);
        }
        redirect(base_url('Edu_form/index/' . $enroll_id), 'refresh');
    }

    public function save_tab42($enroll_id)
    {
        $form_mains = $this->input->post();
        $form_details = $this->input->post();
        echo "<pre>";
        var_dump($form_details);
        echo "</pre>";
    }
}

/* End of file Edu_form.php */
