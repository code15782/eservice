<section>
    <form action="<?= $base_url ?>Member_management/update/<?= $user->id ?>" method="post">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
                    <h3 class="text-center">แบบฟอร์มสมัครสมาชิก</h3>
                    <form role="form" id="contact-form" method="post" autocomplete="off">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-4">
                                    <div class="input-group input-group-static">
                                        <label>ชื่อผู้ใช้งาน</label>
                                        <input name="username" value="<?= $user->username ?>" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>รหัสผ่าน</label>
                                        <input name="password" placeholder="กรอกรหัสผ่านใหม่" class="form-control"
                                            type="password">
                                    </div>
                                </div>
                                <div class="col-md-6 ps-2">
                                    <div class="input-group input-group-static">
                                        <label>ยืนยันรหัสผ่าน</label>
                                        <input name="re_password" placeholder="กรอกรหัสผ่านใหม่" type="password"
                                            class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group input-group-static mb-4">
                                        <label>คำนำหน้าชื่อ</label>
                                        <input name="prefixname" value="<?= $user->prefixname ?>" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group input-group-static mb-4">
                                        <label>ชื่อจริง</label>
                                        <input name="firstname" value="<?= $user->firstname ?>" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-5 ps-2">
                                    <div class="input-group input-group-static">
                                        <label>นามสกุล</label>
                                        <input name="lastname" value="<?= $user->lastname ?>" type="text"
                                            class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-check mb-3 col-md-4">
                                    <input class="form-check-input" type="radio" name="role" value="teacher"
                                        <?= $user->role == 'teacher' ? 'checked' : '' ?>>
                                    <label class="custom-control-label">อาจารย์</label>
                                </div>
                                <div class="form-check col-md-4">
                                    <input class="form-check-input" type="radio" value="staff" name="role"
                                        <?= $user->role == 'staff' ? 'checked' : '' ?>>
                                    <label class="custom-control-label">เจ้าหน้าที่</label>
                                </div>
                                <div class="form-check col-md-4">
                                    <input class="form-check-input" type="radio" value="admin" name="role"
                                        <?= $user->role == 'admin' ? 'checked' : '' ?>>
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