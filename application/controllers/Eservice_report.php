<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eservice_report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        
        $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        
        $this->mpdf = new \Mpdf\Mpdf([
            'setAutoTopMargin' => 'stretch',
            'fontDir' => array_merge($fontDirs, [
                APPPATH . 'controllers/fonts',
            ]),
            'fontdata' => $fontData + [
                'sarabun' => [
                    'R' => 'THSarabunNew.ttf',
                    'I' => 'THSarabunNew-Italic.ttf',
                    'B' => 'THSarabunNew-Bold.ttf',
                    'BI' => 'THSarabunNew-BoldItalic.ttf',
                ]
            ],
            'default_font' => 'sarabun'
        ]);
    }

    public function export(
        $view1,
        $view2,
        $view3,
        $header_view,
        $data1 = [],
        $data2 = [],
        $data3 = [],
        $headder_data = []
    ) {
        $this->mpdf->showImageErrors = true;
        $this->mpdf->useAdobeCJK = true;
        $this->mpdf->autoScriptToLang = true;
        $this->mpdf->autoLangToFont = true;

        $header = $this->load->view($header_view, $headder_data, true);
        $this->mpdf->SetHTMLHeader($header, '', true);

        $html = $this->load->view($view1, $data1, true);
        $this->mpdf->WriteHTML($html);

        $this->mpdf->AddPage('L');
        $html = $this->load->view($view2, $data2, true);
        $this->mpdf->WriteHTML($html);

        $this->mpdf->AddPage('P');
        $html = $this->load->view($view3, $data3, true);
        $this->mpdf->WriteHTML($html);

        $this->mpdf->Output();
    }

    public function index($id)
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

        $form_1_generals = null;
        $form_2_components = null;
        $form_3_elo_mains = null;
        $form_4_plan_details = null;
        $form_4_plan_mains = null;
        $form_5_resources = null;
        $form_6_assesses = null;
        $sector = $section[0]->name;
        $enrolls = $this->Global_model
            ->select(
                'enrolls',
                [['enrolls.status !=' => 'delete'], ['enrolls.id' => $id]],
                [
                    [
                        'table' => 'courses',
                        'condition' => 'courses.id = enrolls.course_id',
                    ],
                    [
                        'table' => 'categories',
                        'condition' => 'categories.id = courses.category_id',
                    ],
                    [
                        'table' => 'semesters',
                        'condition' => 'semesters.id = courses.semester_id',
                    ],
                    [
                        'table' => 'subjects',
                        'condition' => 'subjects.id = courses.subject_id',
                    ],
                ],
                'enrolls.id, 
                 enrolls.form_1_generals_id, 
                 enrolls.form_2_components_id, 
                 enrolls.form_3_elo_mains_id, 
                 enrolls.form_4_plan_mains_id, 
                 enrolls.form_5_resources_id, 
                 enrolls.form_6_assesses_id, 
                 courses.name as course_name,
                 subjects.code as subjects_code,
                 subjects.name_thai as subjects_name_thai,
                 subjects.name_english as subjects_name_english,
                 subjects.unit as subjects_unit,
                 categories.name as categories_name,  
                 subjects.name_thai as subject_name_thai, 
                 semesters.year as semesters_year,
                 semesters.term as semesters_term,
             '
            )
            ->row();

        if (
            isset($enrolls)
                ? (isset($enrolls->form_1_generals_id)
                    ? $enrolls->form_1_generals_id
                    : false)
                : false
        ) {
            $form_1_generals = $this->Global_model
                ->select('form_1_generals', [
                    ['form_1_generals.status !=' => 'delete'],
                    [
                        'form_1_generals.id' => $enrolls->form_1_generals_id,
                    ],
                ])
                ->row();
        }

        if (
            isset($enrolls)
                ? (isset($enrolls->form_2_components_id)
                    ? $enrolls->form_2_components_id
                    : false)
                : false
        ) {
            $form_2_components = $this->Global_model
                ->select('form_2_components', [
                    ['form_2_components.status !=' => 'delete'],
                    [
                        'form_2_components.id' =>
                            $enrolls->form_2_components_id,
                    ],
                ])
                ->row();
        }

        if (
            isset($enrolls)
                ? (isset($enrolls->form_3_elo_mains_id)
                    ? $enrolls->form_3_elo_mains_id
                    : false)
                : false
        ) {
            $form_3_elo_mains = $this->Global_model
                ->select('form_3_elo_mains', [
                    ['form_3_elo_mains.status !=' => 'delete'],
                    [
                        'form_3_elo_mains.id' => $enrolls->form_3_elo_mains_id,
                    ],
                ])
                ->row();
        }

        if (
            isset($enrolls)
                ? (isset($enrolls->form_4_plan_mains_id)
                    ? $enrolls->form_4_plan_mains_id
                    : false)
                : false
        ) {
            $form_4_plan_details = $this->Global_model
                ->select('form_4_plan_details', [
                    ['form_4_plan_details.status !=' => 'delete'],
                    [
                        'form_4_plan_details.form_4_plan_main_id' =>
                            $enrolls->form_4_plan_mains_id,
                    ],
                ])
                ->result();
        }

        if (
            isset($enrolls)
                ? (isset($enrolls->form_4_plan_mains_id)
                    ? $enrolls->form_4_plan_mains_id
                    : false)
                : false
        ) {
            $form_4_plan_mains = $this->Global_model
                ->select('form_4_plan_mains', [
                    ['form_4_plan_mains.status !=' => 'delete'],
                    [
                        'form_4_plan_mains.id' =>
                            $enrolls->form_4_plan_mains_id,
                    ],
                ])
                ->row();
        }

        if (
            isset($enrolls)
                ? (isset($enrolls->form_5_resources_id)
                    ? $enrolls->form_5_resources_id
                    : false)
                : false
        ) {
            $form_5_resources = $this->Global_model
                ->select('form_5_resources', [
                    ['form_5_resources.status !=' => 'delete'],
                    [
                        'form_5_resources.id' => $enrolls->form_5_resources_id,
                    ],
                ])
                ->row();
        }

        if (
            isset($enrolls)
                ? (isset($enrolls->form_6_assesses_id)
                    ? $enrolls->form_6_assesses_id
                    : false)
                : false
        ) {
            $form_6_assesses = $this->Global_model
                ->select('form_6_assesses', [
                    ['form_6_assesses.status !=' => 'delete'],
                    [
                        'form_6_assesses.id' => $enrolls->form_6_assesses_id,
                    ],
                ])
                ->row();
        }

        // output('Eservice_report/index', [
        //     // 'navbar_staff' => true,
        //     'enrolls' => $enrolls,
        //     'form_1_generals' => $form_1_generals,
        //     'form_2_components' => $form_2_components,
        //     'form_3_elo_mains' => $form_3_elo_mains,
        //     'form_4_plan_details' => $form_4_plan_details,
        //     'form_4_plan_mains' => $form_4_plan_mains,
        //     'form_5_resources' => $form_5_resources,
        //     'form_6_assesses' => $form_6_assesses,
        //     'headder_url' => base_url(),
        //     'date_thai' => $this->DateThai(),
        // ]);

        $this->export(
            'Eservice_report/index',
            'Eservice_report/index2',
            'Eservice_report/index3',
            'Eservice_report/navbar',
            [
                'enrolls' => $enrolls,
                'form_1_generals' => $form_1_generals,
                'form_2_components' => $form_2_components,
                'form_3_elo_mains' => $form_3_elo_mains,
            ],
            [
                'form_4_plan_details' => $form_4_plan_details,
                'form_4_plan_mains' => $form_4_plan_mains,
            ],
            [
                'form_5_resources' => $form_5_resources,
                'form_6_assesses' => $form_6_assesses,
            ],
            [
                'headder_url' => base_url(),
                'date_thai' => $this->DateThai(),
                'enrolls' => $enrolls,
                'sector' => $sector,
            ]
        );
    }

    function DateThai()
    {
        $strDate = date('Y-m-d');
        $strYear = date('Y', strtotime($strDate)) + 543;
        $strMonth = date('n', strtotime($strDate));
        $strDay = date('j', strtotime($strDate));
        $strMonthCut = [
            '',
            'มกราคม',
            'กุมภาพันธ์',
            'มีนาคม',
            'เมษายน',
            'พฤษภาคม',
            'มิถุนายน',
            'กรกฏาคม',
            'สิงหาคม',
            'กันยายน',
            'ตุลาคม',
            'พฤศจิกายน',
            'ธันวาคม',
        ];
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
}
