<div class="overflow-auto">
    <table class="table caption-top members">
        <caption>ตารางแสดงรายการปีการศึกษาทั้งหมด</caption>
        </div>
        <thead>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">เทอม</th>
                <th class="text-center" scope="col">ปีการศึกษา</th>
                <th class="text-center" scope="col">ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($semesters as $index => $sem) {
            ?>
                <tr>
                    <td class="text-center"><?= $index + 1 ?></td>
                    <td class="text-center"><?= $sem->term ?></td>
                    <td class="text-center"><?= $sem->year ?></td>
                    <td class="text-center">
                        <a href="<?= $base_url ?>Semester_staff/edit/<?= $sem->id ?>">
                            <button type="button" class="btn bg-gradient-info w-auto me-2">แก้ไขข้อมูล</button>
                        </a>
                        <a href="<?= $base_url ?>Semester_staff/delete/<?= $sem->id ?>">
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
        $('.dataTables_length').append('&nbsp; <a type="button" href="<?= $base_url ?>Semester_staff/new" class="btn bg-gradient-success w-auto">เพิ่ม</a>');
        $('.dataTables_length').addClass('d-flex align-items-center');
        $('#modal').modal('show');
    });
</script>