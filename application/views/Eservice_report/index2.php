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

<!-- <div style="margin: 2%; padding-top:8%"> -->
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
</div>