<form action="<?= $base_url ?>Edu_form/save/<?= $enroll_id ?>/form_1_generals" method="post" role="form" class="text-center">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col">
                <div class="input-group input-group-static">
                    <label>รหัสวิชา</label>
                    <input type="text" class="form-control" value="<?= isset($enroll) ? $enroll->code : '' ?>" disabled>
                </div>
            </div>
            <div class="col">
                <div class="input-group input-group-static">
                    <label>ชื่อวิชา</label>
                    <input type="text" class="form-control" value="<?= isset($enroll) ? $enroll->subject_name_thai : '' ?>" disabled>
                </div>
            </div>
            <div class="col">
                <div class="input-group input-group-static">
                    <label>หน่วยกิต</label>
                    <input type="text" class="form-control" value="<?= isset($enroll) ? $enroll->unit : '' ?>" disabled>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col mt-2">
                <div class="input-group input-group-static">
                    <label>ภาคการศึกษา/ปีการศึกษา</label>
                    <input type="text" class="form-control" value="<?= isset($enroll) ? $enroll->term : '' ?> / <?= isset($enroll) ? $enroll->year : '' ?>" disabled>
                </div>
            </div>
            <div class="col ">
                <div class="input-group input-group-static">
                    <label>หลักสูตร</label>
                    <input type="text" class="form-control" value="<?= isset($enroll) ? $enroll->course_name : '' ?>" disabled>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-3">
            <div class="col mt-3">
                <select class="form-select" aria-label="Default select example" name="type">
                    <option selected disabled>&nbsp; ประเภทของรายวิชา</option>
                    <option value="must">&nbsp;หมวดวิชาบังคับ</option>
                    <option value="free">&nbsp;หมวดวิชาเสรี</option>
                </select>
            </div>
            <div class="col">
                <div class="input-group input-group-static">
                    <label>อาจารย์ผู้รับผิดชอบรายวิชา/ผู้สอน</label>
                    <input type="text" class="form-control" value="<?= isset($form_1_general) ? $form_1_general->teacher_name : '' ?>" name="teacher_name">
                </div>
            </div>
            <div class="col">
                <div class="input-group input-group-static">
                    <label>กลุ่มเรียน (Section)</label>
                    <input type="text" class="form-control" value="<?= isset($form_1_general) ? $form_1_general->section : '' ?>" name="section">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="input-group input-group-static">
                    <label>รายวิชาที่เรียนก่อน (Pre-requisite)</label>
                    <input type="text" class="form-control" value="<?= isset($form_1_general) ? $form_1_general->pre_course : '' ?>" name="pre_course">
                </div>
            </div>
            <div class="col">
                <div class="input-group input-group-static">
                    <label>รายวิชาที่เรียนก่อน (Co-requisite)</label>
                    <input type="text" class="form-control" value="<?= isset($form_1_general) ? $form_1_general->co_course : '' ?>" name="co_course">
                </div>
            </div>
            <div class="col">
                <div class="input-group input-group-static">
                    <label>สถานที่เรียน</label>
                    <input type="text" class="form-control" value="<?= isset($form_1_general) ? $form_1_general->place : '' ?>" name="place">
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">บันทึก</button>
    </div>
</form>