<div class="overflow-auto">
    <table class="table caption-top members">
        <caption>ตารางแสดงรายการสมาชิกทั้งหมด</caption>
        <thead>
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">ชื่อผู้ใช้งาน</th>
                <th class="text-center" scope="col">ชื่อ-สกุล</th>
                <th class="text-center" scope="col">ภาค</th>
                <th class="text-center" scope="col">บทบาท</th>
                <th class="text-center" scope="col">ดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $index => $user) {

            ?>
                <tr>
                    <td class="text-center"><?= $index + 1 ?></td>
                    <td class="text-center"><?= $user->username ?></td>
                    <td class="text-center"><?= $user->prefixname . $user->firstname . " " . $user->lastname ?></td>
                    <td class="text-center"><?= $user->name ?></td>
                    <td class="text-center">
                        <?= convert_member_role($user->role) ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= $base_url ?>Member_management/edit/<?= $user->id ?>">
                            <button type="button" class="btn bg-gradient-info w-auto me-2">แก้ไขข้อมูล</button>
                        </a>
                        <a href="<?= $base_url ?>Member_management/delete/<?= $user->id ?>">
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
        $('.dataTables_length').append('&nbsp; <a type="button" href="<?= $base_url ?>Member_management/new" class="btn bg-gradient-success w-auto">เพิ่ม</a>');
    });
</script>
