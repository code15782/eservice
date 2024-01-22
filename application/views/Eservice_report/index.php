<style>
body {
  font-size: 18px;
}

table, th, tbody, td {
  border:1px solid black;
  border-collapse: collapse;
}

.pl-1p{
  padding-left: 1%;
}

.fz-14{
  font-size: 18px;
}

.fw-n {
  font-weight: normal;
}
</style>

<!-- <div style="margin: 2%; padding-top:9%"> -->
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
      <td class="pl-1p" ><?= (isset($enrolls)
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
        <td style="border:none; width: 10%;">
        </td>
        <td style="border:none; border-top-color: white;">
        เมื่อนักศึกษาเรียนวิชานี้แล้วจะสามารถ (Course learning outcomes: CLOs)
        </td>
        <td style="text-align: center; font-weight: bold;">
          ELO1
        </td>
        <td style="text-align: center; font-weight: bold;">
          ELO2
        </td>
        <td style="text-align: center; font-weight: bold;">
          ELO3
        </td>
        <td style="text-align: center; font-weight: bold;">
          ELO4
        </td>
        <td style="text-align: center; font-weight: bold;">
          ELO5
        </td>
        <td style="text-align: center; font-weight: bold;">
          ELO6
        </td>
      </tr>
      <?php
      if (isset($form_3_elo_mains->clo1) && $form_3_elo_mains->clo1 != '') { ?>
          <tr>
            <td style="text-align: center; font-weight: bold;">
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
            <td style="text-align: center; font-weight: bold;">
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
          <td style="text-align: center; font-weight: bold;">
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
          <td style="text-align: center; font-weight: bold;">
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
          <td style="text-align: center; font-weight: bold;">
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
          <td style="text-align: center; font-weight: bold;">
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
      <td style="border: none; width: 10%;">
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
            <td class="border:none; text-center" style="border: none;">
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
</div>