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

<!-- <div style="margin: 2%; padding-top:10%"> -->
<!-- form tab 5 -->
<p style="font-weight: bold; margin-top: 2%;">5. ทรัพยากรประกอบการเรียนการสอน</p>
<table width="100%" style="margin-top: 2%;">
    <tr>
      <td style="font-weight: bold;">ตำราและเอกสารที่กำหนด
        <div class="card" style="font-weight: normal; border-radius: 0px; background-color: inherit;">
            <p class="fz-14" style="margin-bottom: 0; display: flex;">&nbsp;&nbsp;&nbsp;&nbsp; -&nbsp;<?= isset(
                $form_5_resources
            )
                ? (isset($form_5_resources->must) &&
                $form_5_resources->must != ''
                    ? $form_5_resources->must
                    : 'ไม่มีการระบุตำราและเอกสาร')
                : 'ไม่มีการระบุตำราและเอกสาร' ?>
            </p>
        </div>
      </td>
    </tr>
    <tr>
      <td style="font-weight: bold;">เอกสารและข้อมูลอื่น ๆ ที่แนะนำ
        <div class="card" style="font-weight: normal; border-radius: 0px; background-color: inherit;">
            <p class="fz-14" style="margin-bottom: 0; display: flex;">&nbsp;&nbsp;&nbsp;&nbsp; -&nbsp;<?= isset(
                $form_5_resources
            )
                ? (isset($form_5_resources->order) &&
                $form_5_resources->order != ''
                    ? $form_5_resources->order
                    : 'ไม่มีการระบุเอกสารและข้อมูลอื่น')
                : 'ไม่มีการระบุเอกสารและข้อมูลอื่น' ?>
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
              &nbsp;&nbsp;&nbsp;&nbsp;- แบบประเมินรายวิชา
            </p>
            <p for="check_2" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_student_2 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- การสนทนากลุ่มระหว่างผู้สอนและผู้เรียน
            </p>
            <p for="check_3" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_student_3 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- การสะท้อนความคิด จากพฤติกรรมของผู้เรียน
            </p>
            <p for="check_4" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_student_4 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- ข้อเสนอแนะผ่านทางช่องทางออนไลน์ ที่อาจารย์ผู้สอนได้จัดทำเป็นช่องทางการสื่อสารกับนักศึกษา
            </p>
            <p for="check_5" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_student_5 !== ''
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- อื่นๆ (ระบุ): <?= isset($form_6_assesses)
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
              &nbsp;&nbsp;&nbsp;&nbsp;- แบบประเมินผู้สอนโดยนักศึกษา
            </p>
            <p for="check_7" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_assess_2 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- ผลการทดสอบ
            </p>
            <p for="check_8" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_assess_3 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- การทวนสอบผลประเมินผลลัพธ์การเรียนรู้
            </p>
            <p for="check_9" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_assess_4 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- การประเมินโดยคณะกรรมการประเมินข้อสอบ
            </p>
            <p for="check_10" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_assess_5 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- การสังเกตการณ์สอยของผู้ร่วมทีมการสอน
            </p>
            <p for="check_11" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_assess_6 !== ''
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- อื่นๆ (ระบุ): <?= isset($form_6_assesses)
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
              &nbsp;&nbsp;&nbsp;&nbsp;- สัมนาการจัดการเรียนการสอน
            </p>
            <p for="check_13" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_fix_2 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- การวิจัยในและนอกชั้นเรียน
            </p>
            <p for="check_14" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_fix_3 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- กิจกรรมแลกเปลี่ยนความรู้ / เทคนิคการสอน Coffee Break
            </p>
            <p for="check_15" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_fix_4 !== ''
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- อื่นๆ (ระบุ): <?= isset($form_6_assesses)
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
              &nbsp;&nbsp;&nbsp;&nbsp;- ปรับปรุงรายวิชาในแต่ละปีตามข้อเสนอและผลการทวนสอบ
            </p>
            <p for="check_17" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_ressult_2 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- ปรับปรุงรายวิชาในแต่ละปีตามผลการประเมินผู้สอนโดยนักศึกษา
            </p>
            <p for="check_18" class="fz-14 fw-n" style="margin-bottom: 0; display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_ressult_3 !== ''
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- อื่นๆ (ระบุ): <?= isset($form_6_assesses)
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
              &nbsp;&nbsp;&nbsp;&nbsp;- มีการตั้งคณะกรรมการในสาขาวิชาตรวจสอบผลการประเมินผลการเรียนรู้ที่คาดหวังของรายวิชา โดยตรวจสอบข้อสอบ
              งานที่ได้รับมอบหมาย วิธีการให้คะแนนสอบ และการให้คะแนนพฤติกรรม
            </p>
            <p for="check_20" class="fz-14 fw-n" style="margin-bottom: 0;display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_research_2 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- การทบทวนการให้คะแนนการตรวจผลงานของนักศึกษาโดยกรรมการวิชาการประจำภาควิชาและคณะ
            </p>
            <p for="check_21" class="fz-14 fw-n" style="margin-bottom: 0;display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_research_3 == 'active'
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- การทวนสอบการให้คะแนนจากการสุ่มตรวจผลงานของนักศึกษาโดยอาจารย์หรือผู้ทรงคุณวุฒิอื่นๆ ที่ไม่ใช่อาจารย์ประจำหลักสูตร
            </p>
            <p for="check_22" class="fz-14 fw-n" style="margin-bottom: 0;display: <?= isset(
                $form_6_assesses
            )
                ? ($form_6_assesses->by_research_4 !== ''
                    ? 'block'
                    : 'none')
                : 'none' ?>;">
              &nbsp;&nbsp;&nbsp;&nbsp;- อื่นๆ (ระบุ): <?= isset($form_6_assesses)
                  ? $form_6_assesses->by_research_4
                  : '' ?>
            </p>
          </div>
        </div>
      </td>
    </tr>
</table>
</div>