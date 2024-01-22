<div class="overflow-auto">
    <table class="table caption-top course_table">
        <caption>ตารางแสดงรายการสมาชิกทั้งหมด</caption>
        <thead>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">ชื่อหลักสูตร</th>
                <th class="text-center" scope="col">รหัสรายวิชา</th>
                <th class="text-center" scope="col">ชื่อรายวิชา</th>
                <th class="text-center" scope="col">มคอ.</th>
                <th class="text-center" scope="col">หน่วยกิต</th>
                <th class="text-center" scope="col">เวลา</th>
                <th class="text-center" scope="col">ปีการศึกษา</th>
                <th class="text-center" scope="col">ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enrolls as $index => $enroll) { ?>
                <tr>
                    <td class="text-center">
                        <?= $index + 1 ?>
                    </td>
                    <td class="text-center">
                        <?= $enroll->course_name ?>
                    </td>
                    <td class="text-center">
                        <?= $enroll->code ?>
                    </td>
                    <td class="text-center">
                        <?= $enroll->subject_name_thai ?> (<?= $enroll->subject_name_english ?>)
                    </td>
                    <td class="text-center">
                        <?= $enroll->categorie_name ?>
                    </td>
                    <td class="text-center">
                        <?= $enroll->unit ?>
                    </td>
                    <td class="text-center">
                        (<?= $enroll->time_theory ?>-<?= $enroll->time_lab ?>-<?= $enroll->time_research ?>)
                    </td>
                    <td class="text-center">
                        <?= $enroll->term ?>/<?= $enroll->year ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= $base_url ?>Eservice_teacher/copy/<?= $enroll->id ?>">
                            <button type="button" class="btn bg-gradient-primary w-auto me-2">คัดลอก</button>
                        </a>
                        <a href="<?= $base_url ?>Edu_form/index/<?= $enroll->id ?>">
                            <button type="button" class="btn bg-gradient-warning w-auto me-2">แก้ไข</button>
                        </a>
                        <a href="<?= $base_url ?>Eservice_report/index/<?= $enroll->id ?>" target="_blank">
                            <button type="button" class="btn bg-gradient-info w-auto me-2">รายงาน</button>
                        </a>
                        <a href="<?= $base_url ?>Eservice_teacher/delete/<?= $enroll->id ?>">
                            <button type="button" class="btn bg-gradient-danger w-auto me-2">ลบ</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        var table = $('.course_table').DataTable(configDatatable);
        new $.fn.dataTable.FixedHeader(table);
    });
</script>