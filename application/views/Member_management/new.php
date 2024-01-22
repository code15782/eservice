<section>
    <form action="<?= $base_url ?>Member_management/add" method="post">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
                    <h3 class="text-center">แบบฟอร์มสมัครสมาชิก</h3>
                    <form role="form" id="contact-form" method="post" autocomplete="off">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-4">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label">ชื่อผู้ใช้งาน</label>
                                        <input name="username" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-dynamic mb-4">
                                        <label class="form-label">รหัสผ่าน</label>
                                        <input name="password" class="form-control" type="password">
                                    </div>
                                </div>
                                <div class="col-md-6 ps-2">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label">ยืนยันรหัสผ่าน</label>
                                        <input name="re_password" type="password" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group input-group-dynamic mb-4">
                                        <label class="form-label">คำนำหน้าชื่อ</label>
                                        <input name="prefixname" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group input-group-dynamic mb-4">
                                        <label class="form-label">ชื่อจริง</label>
                                        <input name="firstname" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-5 ps-2">
                                    <div class="input-group input-group-dynamic">
                                        <label class="form-label">นามสกุล</label>
                                        <input name="lastname" type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-check mb-3 col-md-4">
                                    <input class="form-check-input" type="radio" value="teacher" name="role" checked>
                                    <label class="custom-control-label">อาจารย์</label>
                                </div>
                                <div class="form-check col-md-4">
                                    <input class="form-check-input" type="radio" name="role" value="staff">
                                    <label class="custom-control-label">เจ้าหน้าที่</label>
                                </div>
                                <div class="form-check col-md-4">
                                    <input class="form-check-input" type="radio" name="role" value="admin">
                                    <label class="custom-control-label">ผู้ดูแลระบบ</label>
                                </div>
                                <div class="col-12 col-form-label-sm py-4">
                                    <select class="form-select" aria-label="Default select example"
                                        name="section_id">
                                        <option selected disabled>&nbsp; ภาค</option>
                                        <?php
                                        foreach ($sections as $index => $section) {
                                            ?>
                                            <option value="<?= $section->id ?>">
                                            &nbsp; <?= $section->name ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn bg-gradient-dark w-100">บันทึก</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</section>