<div class="overflow-auto">
    <table class="table caption-top members">
        <caption>ตารางแสดงรายการสมาชิกทั้งหมด</caption>
        <thead>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">ชื่อหลักสูตร</th>
                <th class="text-center" scope="col">รหัสรายวิชา</th>
                <th class="text-center" scope="col">ชื่อรายวิชา</th>
                <th class="text-center" scope="col">หน่วยกิต</th>
                <th class="text-center" scope="col">เวลา</th>
                <th class="text-center" scope="col">ปีการศึกษา</th>
                <th class="text-center" scope="col">ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $index => $course) { ?>
                <tr>
                    <td class="text-center">
                        <?= $index + 1 ?>
                    </td>
                    <td class="text-center">
                        <?= $course->course_name ?>
                    </td>
                    <td class="text-center">
                        <?= $course->code ?>
                    </td>
                    <td class="text-center">
                        <?= $course->subject_name_thai ?> (<?= $course->subject_name_english ?>)
                    </td>
                    <td class="text-center">
                        <?= $course->unit ?>
                    </td>
                    <td class="text-center">
                        (<?= $course->time_theory ?>-<?= $course->time_lab ?>-<?= $course->time_research ?>)
                    </td>
                    <td class="text-center">
                        <?= $course->term ?>/<?= $course->year ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= $base_url ?>Eservice_teacher/add/<?= $course->id ?>?last_show_id=<?= $last_show_id ?>">
                            <button type="button" class="btn bg-gradient-info w-auto me-2">เพิ่มไปยังรายวิชาของคุณ</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        var table = $('.members').DataTable(configDatatable);
        new $.fn.dataTable.FixedHeader(table);
    });
</script>