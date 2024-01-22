<div class="overflow-auto">
    <table class="table caption-top members">
        <caption>ตารางแสดงรายการสมาชิกทั้งหมด</caption>
        </div>
        <thead>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">รหัสวิชา</th>
                <th class="text-center" scope="col">ชื่อวิชา (ภาษาไทย)</th>
                <th class="text-center" scope="col">ชื่อวิชา (ภาษาอังกฤษ)</th>
                <th class="text-center" scope="col">หน่วยกิต</th>
                <th class="text-center" scope="col">ชั่วโมงเรียน</th>
                <th class="text-center" scope="col">ชั่่วโมงปฏิบัติ</th>
                <th class="text-center" scope="col">ชั่วโมงค้นคว้าด้วยตนเอง</th>
                <th class="text-center" scope="col">ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($subjects as $index => $sub) {
            ?>
                <tr>
                    <td class="text-center"><?= $index + 1 ?></td>
                    <td class="text-center"><?= $sub->code ?></td>
                    <td class="text-center"><?= $sub->name_thai ?></td>
                    <td class="text-center"><?= $sub->name_english ?></td>
                    <td class="text-center"><?= $sub->unit ?></td>
                    <td class="text-center"><?= $sub->time_theory ?></td>
                    <td class="text-center"><?= $sub->time_lab ?></td>
                    <td class="text-center"><?= $sub->time_research ?></td>
                    <td class="text-center">
                        <a href="<?= $base_url ?>Subject_staff/edit/<?= $sub->id ?>">
                            <button type="button" class="btn bg-gradient-info w-auto me-2">แก้ไขข้อมูล</button>
                        </a>
                        <a href="<?= $base_url ?>Subject_staff/delete/<?= $sub->id ?>">
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

        $('.dataTables_length').append('&nbsp; <a type="button" href="<?= $base_url ?>Subject_staff/new" class="btn bg-gradient-success w-auto">เพิ่ม</a>');
        $('.dataTables_length').addClass('d-flex align-items-center');
        // show
        $('#modal').modal('show');
    });
</script>