<style>
body {
  font-size: 14px;
}

table, th, tbody, td {
  border:1px solid black;
  border-collapse: collapse;
}

.pl-1p{
  padding-left: 1%;
}

.fz-14{
  font-size: 14px;
}

.fw-n {
  font-weight: normal;
}
</style>

<div style="margin: 2%">
<?php if (isset($enrolls)) { ?>
<p style="font-weight: bold; text-align: center"><?= $enrolls->subjects_code .
    ' ' .
    $enrolls->subjects_name_thai .
    ' (' .
    $enrolls->subjects_name_english .
    ')' ?></p>
    <?php } else { ?> 
      <p style="font-weight: bold; text-align: center">-</p>
      <?php } ?>

<!-- table 1 -->
<p style="font-weight: bold;">1. ข้อมูลทั่วไป</p>
<table width="100%">
  <tbody>
    <tr>
      <td style="width: 2%; text-align: center">1</td>
      <td class="pl-1p">ข้อมูลทั่วไป</td>
      <td class="pl-1p"><?= (isset($enrolls)
          ? (isset($enrolls->subjects_code) && $enrolls->subjects_code != ''
              ? $enrolls->subjects_code
              : '-')
          : '-') .
          ' / ' .
          (isset($enrolls)
              ? (isset($enrolls->subjects_name_thai) &&
              $enrolls->subjects_name_thai != ''
                  ? $enrolls->subjects_name_thai
                  : '-')
              : '-') .
          (isset($enrolls)
              ? (isset($enrolls->subjects_name_english) &&
              $enrolls->subjects_name_english != ''
                  ? ' (' . $enrolls->subjects_name_english . ') '
                  : '')
              : '') .
          ' / ' .
          (isset($form_1_generals->type) && $form_1_generals->type == 'free'
              ? 'หมวดวิชาเสรี'
              : (isset($form_1_generals->type) &&
              $form_1_generals->type == 'must'
                  ? 'หมวดวิชาบังคับ'
                  : (isset($form_1_generals->type) &&
                  $form_1_generals->type == 'none'
                      ? 'ไม่ระบุหมวดวิชา'
                      : (isset($form_1_generals->type) &&
                      $form_1_generals->type == ''
                          ? '-'
                          : '-')))) ?></td>
    </tr> 

    <tr>
      <td style="text-align: center">2</td>
      <td class="pl-1p">หลักสูตร</td> 
      <td class="pl-1p"><?= isset($enrolls)
          ? (isset($enrolls->course_name) && $enrolls->course_name != ''
              ? $enrolls->course_name
              : '-')
          : '-' ?></td>
    </tr>

    <tr>
      <td style="text-align: center">3</td>
      <td class="pl-1p">อาจารย์ผู้รับผิดชอบรายวิชา / ผู้สอน / กลุ่มเรียน</td> 
      <td class="pl-1p"><?= (isset($form_1_generals) &&
      isset($form_1_generals->teacher_name) &&
      $form_1_generals->teacher_name != ''
          ? $form_1_generals->teacher_name
          : '-') .
          ' / ' .
          (isset($form_1_generals)
              ? (isset($form_1_generals->section) &&
              $form_1_generals->section != ''
                  ? 'Section ' . $form_1_generals->section
                  : '-')
              : '-') ?></td>
    </tr>

    <tr>
      <td style="text-align: center">4</td>
      <td class="pl-1p">ภาคการศึกษา / ปีการศึกษา</td> 
      <td class="pl-1p"><?= (isset($enrolls)
          ? (isset($enrolls->semesters_term) && $enrolls->semesters_term != ''
              ? $enrolls->semesters_term
              : '-')
          : '-') .
          ' / ' .
          (isset($enrolls)
              ? (isset($enrolls->semesters_year) &&
              $enrolls->semesters_year != ''
                  ? $enrolls->semesters_year
                  : '-')
              : '-') ?></td>
    </tr>

    <tr>
      <td style="text-align: center">5</td>
      <td class="pl-1p">รายวิชาที่เรียนก่อน (Pre-requisite) / ที่เรียนพร้อมกัน (Co-requisite)</td> 
      <td class="pl-1p"><?= (isset($form_1_generals)
          ? (isset($form_1_generals->pre_course) &&
          $form_1_generals->pre_course != ''
              ? $form_1_generals->pre_course
              : '-')
          : '-') .
          ' / ' .
          (isset($form_1_generals)
              ? (isset($form_1_generals->co_course) &&
              $form_1_generals->co_course != ''
                  ? $form_1_generals->co_course
                  : '-')
              : '-') ?></td>
    </tr>

    <tr>
      <td style="text-align: center">6</td>
      <td class="pl-1p">สถานที่เรียน</td> 
      <td class="pl-1p"><?= isset($form_1_generals)
          ? (isset($form_1_generals->place) && $form_1_generals->place != ''
              ? $form_1_generals->place
              : '-')
          : '-' ?></td>
    </tr>
  </tbody>
</table>

<!-- table 2 -->
<p style="font-weight: bold; margin-top: 2%;">2. ส่วนประกอบของรายวิชา</p>
<table width="100%">
    <tr>
      <td style="width: 2%; text-align: center">1</td>
      <td class="pl-1p">คำอธิบายรายวิชา</td>
      <td class="pl-1p"><?= isset($form_2_components)
          ? (isset($form_2_components->description) &&
          $form_2_components->description != ''
              ? $form_2_components->description
              : '-')
          : '-' ?></td>
    </tr>
    <tr>
      <td style="text-align: center">2</td>
      <td class="pl-1p">จำนวนชั่วโมงที่ใช้ (ชม. / ภาคการศึกษา)</td>
      <td class="pl-1p">บรรยาย / การฝึกปฏิบัติ / การศึกษาด้วยตัวเอง ( <?= (isset(
          $form_2_components
      )
          ? (isset($form_2_components->theory) &&
          $form_2_components->theory != ''
              ? $form_2_components->theory
              : '-')
          : '-') .
          ' / ' .
          (isset($form_2_components)
              ? (isset($form_2_components->lab) && $form_2_components->lab != ''
                  ? $form_2_components->lab
                  : '-')
              : '-') .
          ' / ' .
          (isset($form_2_components)
              ? (isset($form_2_components->research) &&
              $form_2_components->research != ''
                  ? $form_2_components->research
                  : '-')
              : '-') .
          ' )' ?></td>
    </tr>
    <tr>
      <td style="text-align: center">3</td>
      <td class="pl-1p">จำนวนชั่วโมงที่อาจารย์จะให้คำปรึกษาเป็นรายบุคคล (ชม. / สัปดาห์)</td>
      <td class="pl-1p">ตัวต่อตัว / ผ่านเทคโนโลยีสารสนเทศ ( <?= (isset(
          $form_2_components
      )
          ? (isset($form_2_components->private) &&
          $form_2_components->private != ''
              ? $form_2_components->private
              : '-')
          : '-') .
          ' / ' .
          (isset($form_2_components)
              ? (isset($form_2_components->technology) &&
              $form_2_components->technology != ''
                  ? $form_2_components->technology
                  : '-')
              : '-') .
          ' )' ?></td>
    </tr>
</table>

<!-- table 3 -->
<p style="font-weight: bold; margin-top: 2%;">3. การพัฒนาผลการเรียนรู้ที่คาดหวังของนักศึกษา</p>
<table width="100%" style="border: none;">
  <?php if (
      isset($form_3_elo_mains) &&
      ((isset($form_3_elo_mains->clo1) && $form_3_elo_mains->clo1 != '') ||
          (isset($form_3_elo_mains->clo2) && $form_3_elo_mains->clo2 != '') ||
          (isset($form_3_elo_mains->clo3) && $form_3_elo_mains->clo3 != '') ||
          (isset($form_3_elo_mains->clo4) && $form_3_elo_mains->clo4 != '') ||
          (isset($form_3_elo_mains->clo5) && $form_3_elo_mains->clo5 != '') ||
          (isset($form_3_elo_mains->clo6) && $form_3_elo_mains->clo6 != ''))
  ) { ?>
      <tr>
        <td style="border:none; width: 5%;">
        </td>
        <td style="border:none; border-top-color: white;">
        เมื่อนักศึกษาเรียนวิชานี้แล้วจะสามารถ (Course learning outcomes: CLOs)
        </td>
        <td style="text-align: center">
          ELO1
        </td>
        <td style="text-align: center">
          ELO2
        </td>
        <td style="text-align: center">
          ELO3
        </td>
        <td style="text-align: center">
          ELO4
        </td>
        <td style="text-align: center">
          ELO5
        </td>
        <td style="text-align: center">
          ELO6
        </td>
      </tr>
      <?php
      if (isset($form_3_elo_mains->clo1) && $form_3_elo_mains->clo1 != '') { ?>
          <tr>
            <td style="text-align: center">
              <?= $form_3_elo_mains->clo1 ? 'CLO 1' : '-' ?>
            </td>
            <td class="pl-1p">
            <?= $form_3_elo_mains->clo1 ?>
            </td>
            <td style="text-align: center">
              <?= $form_3_elo_mains->elo1_checkbox_1 == 'active' ? '/' : '' ?>
            </td>
            <td style="text-align: center">
              <?= $form_3_elo_mains->elo2_checkbox_1 == 'active' ? '/' : '' ?>
            </td>
            <td style="text-align: center">
              <?= $form_3_elo_mains->elo3_checkbox_1 == 'active' ? '/' : '' ?>
            </td>
            <td style="text-align: center">
              <?= $form_3_elo_mains->elo4_checkbox_1 == 'active' ? '/' : '' ?>
            </td>
            <td style="text-align: center">
              <?= $form_3_elo_mains->elo5_checkbox_1 == 'active' ? '/' : '' ?>
            </td>
            <td style="text-align: center">
              <?= $form_3_elo_mains->elo6_checkbox_1 == 'active' ? '/' : '' ?>
            </td>
          </tr>
        <?php }
      if (isset($form_3_elo_mains->clo2) && $form_3_elo_mains->clo2 != '') { ?>
          <tr>
            <td style="text-align: center">
              <?= $form_3_elo_mains->clo2 ? 'CLO 2' : '-' ?>
            </td>
            <td class="pl-1p">
            <?= $form_3_elo_mains->clo2 ?>
            </td>
            <td style="text-align: center">
              <?= $form_3_elo_mains->elo1_checkbox_2 == 'active' ? '/' : '' ?>
            </td>
            <td style="text-align: center">
              <?= $form_3_elo_mains->elo2_checkbox_2 == 'active' ? '/' : '' ?>
            </td>
            <td style="text-align: center">
              <?= $form_3_elo_mains->elo3_checkbox_2 == 'active' ? '/' : '' ?>
            </td>
            <td style="text-align: center">
              <?= $form_3_elo_mains->elo4_checkbox_2 == 'active' ? '/' : '' ?>
            </td>
            <td style="text-align: center">
              <?= $form_3_elo_mains->elo5_checkbox_2 == 'active' ? '/' : '' ?>
            </td>
            <td style="text-align: center">
              <?= $form_3_elo_mains->elo6_checkbox_2 == 'active' ? '/' : '' ?>
            </td>
          </tr>
          <?php }
      if (isset($form_3_elo_mains->clo3) && $form_3_elo_mains->clo3 != '') { ?>
        <tr>
          <td style="text-align: center">
            <?= $form_3_elo_mains->clo3 ? 'CLO 3' : '-' ?>
          </td>
          <td class="pl-1p">
          <?= $form_3_elo_mains->clo3 ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo1_checkbox_3 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo2_checkbox_3 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo3_checkbox_3 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo4_checkbox_3 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo5_checkbox_3 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo6_checkbox_3 == 'active' ? '/' : '' ?>
          </td>
        </tr>
        <?php }
      if (isset($form_3_elo_mains->clo4) && $form_3_elo_mains->clo4 != '') { ?>
        <tr>
          <td style="text-align: center">
            <?= $form_3_elo_mains->clo4 ? 'CLO 4' : '-' ?>
          </td>
          <td class="pl-1p">
          <?= $form_3_elo_mains->clo4 ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo1_checkbox_4 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo2_checkbox_4 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo3_checkbox_4 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo4_checkbox_4 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo5_checkbox_4 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo6_checkbox_4 == 'active' ? '/' : '' ?>
          </td>
        </tr>
        <?php }
      if (isset($form_3_elo_mains->clo5) && $form_3_elo_mains->clo5 != '') { ?>
        <tr>
          <td style="text-align: center">
            <?= $form_3_elo_mains->clo5 ? 'CLO 5' : '-' ?>
          </td>
          <td class="pl-1p">
          <?= $form_3_elo_mains->clo5 ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo1_checkbox_5 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo2_checkbox_5 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo3_checkbox_5 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo4_checkbox_5 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo5_checkbox_5 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo6_checkbox_5 == 'active' ? '/' : '' ?>
          </td>
        </tr>
        <?php }
      if (isset($form_3_elo_mains->clo6) && $form_3_elo_mains->clo6 != '') { ?>
        <tr>
          <td style="text-align: center">
            <?= $form_3_elo_mains->clo6 ? 'CLO 6' : '-' ?>
          </td>
          <td class="pl-1p">
          <?= $form_3_elo_mains->clo6 ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo1_checkbox_6 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo2_checkbox_6 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo3_checkbox_6 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo4_checkbox_6 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo5_checkbox_6 == 'active' ? '/' : '' ?>
          </td>
          <td style="text-align: center">
            <?= $form_3_elo_mains->elo6_checkbox_6 == 'active' ? '/' : '' ?>
          </td>
        </tr>
        <?php }
      } else { ?>
          <tr>
           <td style="border:none;">
            </td>
            <td style="border:none;">
            - ยังไม่มีการระบุ CLO
            </td>
            <td style="border:none;">
            </td>
            <td style="border:none;">
            </td>
            <td style="border:none;">
            </td>
            <td style="border:none;">
            </td>
            <td style="border:none;">
            </td>
            <td style="border:none;">
            </td>
          </tr>
          <?php } ?>
</table>
<table style="width: 100%;">
  <?php if (
      isset($form_3_elo_mains) &&
      ((isset($form_3_elo_mains->elo1) && $form_3_elo_mains->elo1 != '') ||
          (isset($form_3_elo_mains->elo2) && $form_3_elo_mains->elo2 != '') ||
          (isset($form_3_elo_mains->elo3) && $form_3_elo_mains->elo3 != '') ||
          (isset($form_3_elo_mains->elo4) && $form_3_elo_mains->elo4 != '') ||
          (isset($form_3_elo_mains->elo5) && $form_3_elo_mains->elo5 != '') ||
          (isset($form_3_elo_mains->elo6) && $form_3_elo_mains->elo6 != ''))
  ) { ?>
    <tr>
      <td style="border: none; width: 5%;">
      </td>
      <td style="border: none;">
         สอดคล้องกับผลการเรียนรู้ที่คาดหวังของหลักสูตร IPTM (Expected learning outcomes: ELOs) ดังนี้
      </td>
      <td style="border: none;"> 
      </td>
      <td style="border: none;"> 
      </td>
      <td style="border: none;"> 
      </td>
      <td style="border: none;"> 
      </td>
      <td style="border: none;"> 
      </td>
      <td style="border: none;"> 
      </td>
    </tr>
    <?php
    if (isset($form_3_elo_mains->elo1) && $form_3_elo_mains->elo1 != '') { ?>
          <tr>
            <td class="text-center" style="border: none;">
              ELO 1
            </td>
            <td style="border: none;">
            <?= $form_3_elo_mains->elo1 ?>
            </td>
          </tr>
    <?php }
    if (isset($form_3_elo_mains->elo2) && $form_3_elo_mains->elo2 != '') { ?>
          <tr>
            <td class="text-center" style="border: none;">
              ELO 2
            </td>
            <td style="border: none;">
            <?= $form_3_elo_mains->elo2 ?>
            </td>
          </tr>
    <?php }
    if (isset($form_3_elo_mains->elo3) && $form_3_elo_mains->elo3 != '') { ?>
          <tr>
            <td class="text-center" style="border: none;">
              ELO 3
            </td>
            <td style="border: none;">
            <?= $form_3_elo_mains->elo3 ?>
            </td>
          </tr>
    <?php }
    if (isset($form_3_elo_mains->elo4) && $form_3_elo_mains->elo4 != '') { ?>
          <tr>
            <td class="text-center" style="border: none;">
              ELO 4
            </td>
            <td style="border: none;">
            <?= $form_3_elo_mains->elo4 ?>
            </td>
          </tr>
    <?php }
    if (isset($form_3_elo_mains->elo5) && $form_3_elo_mains->elo5 != '') { ?>
          <tr>
            <td class="text-center" style="border: none;">
              ELO 5
            </td>
            <td style="border: none;">
            <?= $form_3_elo_mains->elo5 ?>
            </td>
          </tr>
    <?php }
    if (isset($form_3_elo_mains->elo6) && $form_3_elo_mains->elo6 != '') { ?>
        <tr>
          <td class="text-center" style="border: none;">
            ELO 6
          </td>
          <td style="border: none;">
          <?= $form_3_elo_mains->elo6 ?>
          </td>
        </tr>
    <?php }
    } else { ?>
      <tr>
        <td style="border: none;">
        </td>
        <td style="border: none;">
        - ยังไม่มีการระบุ ELO
        </td>
        <td style="border: none;">
        </td>
        <td style="border: none;">
        </td>
        <td style="border: none;">
        </td>
        <td style="border: none;">
        </td>
        <td style="border: none;">
        </td>
        <td style="border: none;">
        </td>
      </tr>
      <?php } ?>
</table>

<!-- form tab 4 -->
<p style="font-weight: bold; margin-top: 2%;">4. แผนการสอนและการประเมินผล</p>
<table width="100%" style="margin-top: 2%;">
  <thead>
    <tr style="text-align: center">
      <th>สัปดาห์</th>
      <th>หัวข้อ/รายละเอียด</th>
      <th>ชั่วโมง</th>
      <th>กิจกรรมการเรียนการสอนและสื่อที่ใช้</th>
      <th>CLO</th>
      <th>กิจกรรมการประเมิน</th>
    </tr>
  </thead>
  <tbody>
    <?php if (isset($form_4_plan_details) && count($form_4_plan_details) > 0) {
        foreach ($form_4_plan_details as $index => $form_4) {

            $count_active = 0;
            if ($form_4->clo1 == 'active') {
                $count_active++;
            }
            if ($form_4->clo2 == 'active') {
                $count_active++;
            }
            if ($form_4->clo3 == 'active') {
                $count_active++;
            }
            if ($form_4->clo4 == 'active') {
                $count_active++;
            }
            ?>
        <tr>
          <td style="text-align: center"><?= isset($form_4)
              ? (isset($form_4->week) && $form_4->week != ''
                  ? $form_4->week
                  : '-')
              : '-' ?></td>

        <td style="<?= isset($form_4)
            ? ($form_4->title != ''
                ? ''
                : 'text-align: center;')
            : 'text-align: center;' ?>;">
            <?= isset($form_4) && $form_4->title != ''
                ? (isset($form_4->title)
                    ? $form_4->title
                    : '-')
                : '-' ?></td>
              
          <td style="text-align: center"><?= isset($form_4)
              ? (isset($form_4->time) && $form_4->time != ''
                  ? $form_4->time
                  : '-')
              : '-' ?></td>

          <td  style="<?= isset($form_4)
              ? ($form_4->activity_1 != ''
                  ? ''
                  : 'text-align: center;')
              : 'text-align: center;' ?>;">
            <?= isset($form_4)
                ? (isset($form_4->activity_1) && $form_4->activity_1 != ''
                    ? $form_4->activity_1
                    : '-')
                : '-' ?></td>

          <?php if (
              isset($form_4)
                  ? ($form_4->clo1 == 'active' ||
                  $form_4->clo2 == 'active' ||
                  $form_4->clo3 == 'active' ||
                  $form_4->clo4 == 'active'
                      ? true
                      : false)
                  : false
          ) { ?>
            <td style="text-align: center"><?= isset($form_4)
                ? ($form_4->clo1 == 'active' && $count_active > 1
                    ? '1 / '
                    : ($form_4->clo1 == 'active' && ($count_active = 1)
                        ? '1'
                        : ''))
                : '' ?>
              <?= isset($form_4)
                  ? (($form_4->clo2 == 'active' &&
                      $count_active > 1 &&
                      $form_4->clo1 == 'inactive') ||
                  ($form_4->clo2 == 'active' && $count_active > 2)
                      ? '2 / '
                      : ($form_4->clo2 == 'active'
                          ? '2'
                          : ''))
                  : '' ?>
              <?= isset($form_4)
                  ? (($form_4->clo3 == 'active' &&
                      $count_active > 1 &&
                      $form_4->clo1 == 'inactive') ||
                  ($form_4->clo3 == 'active' && $count_active > 3)
                      ? '3 / '
                      : ($form_4->clo3 == 'active'
                          ? '3'
                          : ''))
                  : '' ?>
              <?= isset($form_4)
                  ? (($form_4->clo4 == 'active' &&
                      $count_active > 1 &&
                      $form_4->clo1 == 'inactive') ||
                  ($form_4->clo4 == 'active' && $count_active > 4)
                      ? '4 / '
                      : ($form_4->clo4 == 'active'
                          ? '4'
                          : ''))
                  : '' ?></td>
          <?php } else { ?>
            <td style="text-align: center">-</td>
          <?php } ?>

          <td style="<?= isset($form_4)
              ? ($form_4->activity_2 != ''
                  ? ''
                  : 'text-align: center;')
              : 'text-align: center;' ?>;">
              <?= isset($form_4)
                  ? (isset($form_4->activity_2) && $form_4->activity_2 != ''
                      ? $form_4->activity_2
                      : '-')
                  : '-' ?></td>
        </tr>
      <?php
        }
    } else {
         ?>
      <tr>
        <td style="text-align: center">-</td>
        <td style="text-align: center">-</td>
        <td style="text-align: center">-</td>
        <td style="text-align: center">-</td>
        <td style="text-align: center">-</td>
        <td style="text-align: center">-</td>
      </tr>
    <?php
    } ?>
  </tbody>
</table>
<p>สัดส่วนในการประเมิน กลางภาค / ปลายภาค / งานที่ได้รับมอบหมาย / อื่น ๆ: (
  <?= (isset($form_4_plan_mains)
      ? (isset($form_4_plan_mains->percent_1) &&
      $form_4_plan_mains->percent_1 != ''
          ? $form_4_plan_mains->percent_1 . ' / '
          : '- / ')
      : '- / ') .
      (isset($form_4_plan_mains)
          ? (isset($form_4_plan_mains->percent_2) &&
          $form_4_plan_mains->percent_2 != ''
              ? $form_4_plan_mains->percent_2 . ' / '
              : '- / ')
          : '- / ') .
      (isset($form_4_plan_mains)
          ? (isset($form_4_plan_mains->percent_3) &&
          $form_4_plan_mains->percent_3 != ''
              ? $form_4_plan_mains->percent_3 . ' / '
              : '- / ')
          : '- / ') .
      (isset($form_4_plan_mains)
          ? (isset($form_4_plan_mains->percent_4) &&
          $form_4_plan_mains->percent_4 != ''
              ? $form_4_plan_mains->percent_4 . ' '
              : '- ')
          : '- ') ?>)</p>

<!-- form tab 5 -->
<p style="font-weight: bold; margin-top: 2%;">5. ทรัพยากรประกอบการเรียนการสอน</p>
<table width="100%" style="margin-top: 2%;">
    <tr>
      <td style="font-weight: bold;">ตำราและเอกสารที่กำหนด
        <div class="card" style="font-weight: normal; border-radius: 0px; background-color: inherit;">
            <p class="fz-14" style="margin-bottom: 0; display: flex;">&emsp; <?= isset(
                $form_5_resources
            )
                ? (isset($form_5_resources->must) &&
                $form_5_resources->must != ''
                    ? $form_5_resources->must
                    : '- ไม่มีการระบุตำราและเอกสาร')
                : '- ไม่มีการระบุตำราและเอกสาร' ?>
            </p>
        </div>
      </td>
    </tr>
    <tr>
      <td style="font-weight: bold;">เอกสารและข้อมูลอื่น ๆ ที่แนะนำ
        <div class="card" style="font-weight: normal; border-radius: 0px; background-color: inherit;">
            <p class="fz-14" style="margin-bottom: 0; display: flex;">&emsp; <?= isset(
                $form_5_resources
            )
                ? (isset($form_5_resources->order) &&
                $form_5_resources->order != ''
                    ? $form_5_resources->order
                    : '- ไม่มีการระบุเอกสารและข้อมูลอื่น')
                : '- ไม่มีการระบุเอกสารและข้อมูลอื่น' ?>
            </p>
        </div>
      </td>
    </tr>
</table>

<!-- form tab 6 -->
<p style="font-weight: bold; margin-top: 2%;">6. การประเมินรายวิชาและกระบวนการปรับปรุง</p>
<table width="100%" style="margin-top: 2%;">
    <tr>
      <td style="font-weight: bold;">1. กลยุทธ์การประเมินประสิทธิผลโดยนักศึกษา<?= isset(
          $form_6_assesses
      )
          ? ($form_6_assesses->by_student_1 == 'active' ||
          $form_6_assesses->by_student_2 == 'active' ||
          $form_6_assesses->by_student_3 == 'active' ||
          $form_6_assesses->by_student_4 == 'active' ||
          $form_6_assesses->by_student_5 !== ''
              ? ''
              : ': -')
          : ': -' ?>
        <div class="row">
          <div class="text-start">
            <p for="check_1" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_student_1 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- แบบประเมินรายวิชา
            </p>
            <p for="check_2" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_student_2 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- การสนทนากลุ่มระหว่างผู้สอนและผู้เรียน
            </p>
            <p for="check_3" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_student_3 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- การสะท้อนความคิด จากพฤติกรรมของผู้เรียน
            </p>
            <p for="check_4" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_student_4 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- ข้อเสนอแนะผ่านทางช่องทางออนไลน์ ที่อาจารย์ผู้สอนได้จัดทำเป็นช่องทางการสื่อสารกับนักศึกษา
            </p>
            <p for="check_5" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_student_5 !== ''
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- อื่นๆ (ระบุ): <?= isset($form_6_assesses)
                  ? $form_6_assesses->by_student_5
                  : '' ?>
            </p>
          </div>
        </div>
        </div>
      </td>
    </tr>

    <tr>
      <td style="font-weight: bold;">2. เอกสารและข้อมูลอื่นๆที่แนะนำ<?= isset(
          $form_6_assesses
      )
          ? ($form_6_assesses->by_assess_1 == 'active' ||
          $form_6_assesses->by_assess_2 == 'active' ||
          $form_6_assesses->by_assess_3 == 'active' ||
          $form_6_assesses->by_assess_4 == 'active' ||
          $form_6_assesses->by_assess_5 == 'active' ||
          $form_6_assesses->by_assess_6 !== ''
              ? ''
              : ': -')
          : ': -' ?>
        <div class="row">
          <div class="text-start">
            <p for="check_6" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_assess_1 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- แบบประเมินผู้สอนโดยนักศึกษา
            </p>
            <p for="check_7" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_assess_2 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- ผลการทดสอบ
            </p>
            <p for="check_8" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_assess_3 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- การทวนสอบผลประเมินผลลัพธ์การเรียนรู้
            </p>
            <p for="check_9" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_assess_4 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- การประเมินโดยคณะกรรมการประเมินข้อสอบ
            </p>
            <p for="check_10" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_assess_5 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- การสังเกตการณ์สอยของผู้ร่วมทีมการสอน
            </p>
            <p for="check_11" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_assess_6 !== ''
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- อื่นๆ (ระบุ): <?= isset($form_6_assesses)
                  ? $form_6_assesses->by_assess_6
                  : '' ?>
            </p>
          </div>
        </div>
      </td>
    </tr>

    <tr>
      <td style="font-weight: bold;">3. การปรับปรุงการสอน<?= isset(
          $form_6_assesses
      )
          ? ($form_6_assesses->by_fix_1 == 'active' ||
          $form_6_assesses->by_fix_2 == 'active' ||
          $form_6_assesses->by_fix_3 == 'active' ||
          $form_6_assesses->by_fix_4 !== ''
              ? ''
              : ': -')
          : ': -' ?>
        <div class="row">
          <div class="text-start">
            <p for="check_12" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_fix_1 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- สัมนาการจัดการเรียนการสอน
            </p>
            <p for="check_13" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_fix_2 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- การวิจัยในและนอกชั้นเรียน
            </p>
            <p for="check_14" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_fix_3 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- กิจกรรมแลกเปลี่ยนความรู้ / เทคนิคการสอน Coffee Break
            </p>
            <p for="check_15" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_fix_4 !== ''
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- อื่นๆ (ระบุ): <?= isset($form_6_assesses)
                  ? $form_6_assesses->by_fix_4
                  : '' ?>
            </p>
          </div>
        </div>
      </td>
    </tr>

    <tr>
      <td style="font-weight: bold;">4. การดำเนินการทบทวนและวางแผนการปรับปรุงประสิทธิผลของรายวิชา<?= isset(
          $form_6_assesses
      )
          ? ($form_6_assesses->by_ressult_1 == 'active' ||
          $form_6_assesses->by_ressult_2 == 'active' ||
          $form_6_assesses->by_ressult_3 !== ''
              ? ''
              : ': -')
          : ': -' ?>
        <div class="row">
          <div class="text-start">
            <p for="check_16" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_ressult_1 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- ปรับปรุงรายวิชาในแต่ละปีตามข้อเสนอและผลการทวนสอบ
            </p>
            <p for="check_17" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_ressult_2 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- ปรับปรุงรายวิชาในแต่ละปีตามผลการประเมินผู้สอนโดยนักศึกษา
            </p>
            <p for="check_18" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_ressult_3 !== ''
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- อื่นๆ (ระบุ): <?= isset($form_6_assesses)
                  ? $form_6_assesses->by_ressult_3
                  : '' ?>
            </p>
          </div>
        </div>
      </td>
    </tr>

    <tr>
      <td  style="font-weight: bold; width: 100%">6. การทวนสอบผลการเรียนรู้ที่คาดหวังของรายวิชานักศึกษา<?= isset(
          $form_6_assesses
      )
          ? ($form_6_assesses->by_research_1 == 'active' ||
          $form_6_assesses->by_research_2 == 'active' ||
          $form_6_assesses->by_research_3 == 'active' ||
          $form_6_assesses->by_research_4 !== ''
              ? ''
              : ': -')
          : ': -' ?>
        <div class="row">
          <div class="text-start">
            <p for="check_19" class="fz-14 fw-n" style="margin-bottom: 0;display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_research_1 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- มีการตั้งคณะกรรมการในสาขาวิชาตรวจสอบผลการประเมินผลการเรียนรู้ที่คาดหวังของรายวิชา โดยตรวจสอบข้อสอบ
              งานที่ได้รับมอบหมาย วิธีการให้คะแนนสอบ และการให้คะแนนพฤติกรรม
            </p>
            <p for="check_20" class="fz-14 fw-n" style="margin-bottom: 0;display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_research_2 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- การทบทวนการให้คะแนนการตรวจผลงานของนักศึกษาโดยกรรมการวิชาการประจำภาควิชาและคณะ
            </p>
            <p for="check_21" class="fz-14 fw-n" style="margin-bottom: 0;display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_research_3 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- การทวนสอบการให้คะแนนจากการสุ่มตรวจผลงานของนักศึกษาโดยอาจารย์หรือผู้ทรงคุณวุฒิอื่นๆ ที่ไม่ใช่อาจารย์ประจำหลักสูตร
            </p>
            <p for="check_22" class="fz-14 fw-n" style="margin-bottom: 0;display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_research_4 !== ''
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &emsp;&emsp;- อื่นๆ (ระบุ): <?= isset($form_6_assesses)
                  ? $form_6_assesses->by_research_4
                  : '' ?>
            </p>
          </div>
        </div>
      </td>
    </tr>
</table>
</div>