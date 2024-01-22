<div class="overflow-auto">
    <table class="table caption-top members">
        <caption>ตารางแสดงรายการสมาชิกทั้งหมด</caption>
        </div>
        <thead>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">หมวดหมู่</th>
                <th class="text-center" scope="col">ชื่อหลักสูตร</th>
                <th class="text-center" scope="col">ชื่อรายวิชา</th>
                <th class="text-center" scope="col">ปีการศึกษา</th>
                <th class="text-center" scope="col">ภาค</th>
                <th class="text-center" scope="col">ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($courses as $index => $cou) {
            ?>
                <tr>
                    <td class="text-center"><?= $index + 1 ?></td>
                    <td class="text-center"><?= $cou->categories_name ?></td>
                    <td class="text-center"><?= $cou->course_name ?></td>
                    <td class="text-center"><?= $cou->subject_name_thai ?></td>
                    <td class="text-center"><?= $cou->term ?>/<?= $cou->year ?></td>
                    <td class="text-center"><?= $cou->section_name ?></td>
                    <td class="text-center">
                        <a href="<?= $base_url ?>Eservice_course/edit/<?= $cou->id ?>">
                            <button type="button" class="btn bg-gradient-info w-auto me-2">แก้ไขข้อมูล</button>
                        </a>
                        <a href="<?= $base_url ?>Eservice_course/copy/<?= $cou->id ?>">
                            <button type="button" class="btn bg-gradient-warning w-auto me-2">คัดลอก</button>
                        </a>
                        <a href="<?= $base_url ?>Eservice_course/delete/<?= $cou->id ?>">
                            <button type="button" class="btn bg-gradient-danger w-auto me-2">ลบข้อมูล</button>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {

        var table = $('.members').DataTable(configDatatable);
        new $.fn.dataTable.FixedHeader(table);
        $('.dataTables_length').append('&nbsp; <a type="button" href="<?= $base_url ?>Eservice_course/new" class="btn bg-gradient-success w-auto">เพิ่ม</a>');
        $('.dataTables_length').addClass('d-flex align-items-center');
    });
</script>