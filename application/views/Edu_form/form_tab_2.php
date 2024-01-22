<form action="<?= $base_url ?>Edu_form/save/<?= $enroll_id ?>/form_2_components" method="post" role="form" class="text-center">
    <div class="row" style="margin: 1em;">
        <div class="col-md-12">
            <div class="input-group input-group-static mb-4">
                <label>คำอธิบายวิชา</label>
                <textarea class="form-control" type="text" name="description"><?= isset($form_2_component) ? $form_2_component->description : '' ?></textarea>
            </div>
        </div>
    </div>
    <div class="row" style="margin: 1em;">
        <div class="col-sm-4">
            <label style="margin-top: 2em;">จำนวนชั่วโมงที่ใช้ (ชม./ภาคการศึกษา)</label>
        </div>
        <div class="col-sm">
            <div class="input-group input-group-static">
                <label>ทฤษฎี</label>
                <input type="text" class="form-control" placeholder="" value="<?= isset($form_2_component) ? $form_2_component->theory : '' ?>" name="theory">
            </div>
        </div>
        <div class="col-sm">
            <div class="input-group input-group-static">
                <label>การฝึกปฏิบัติ</label>
                <input type="text" class="form-control" placeholder="" value="<?= isset($form_2_component) ? $form_2_component->lab : '' ?>" name="lab">
            </div>
        </div>
        <div class="col-sm">
            <div class="input-group input-group-static">
                <label>การศึกษาด้วยตนเอง</label>
                <input type="text" class="form-control" placeholder="" value="<?= isset($form_2_component) ? $form_2_component->research : '' ?>" name="research">
            </div>
        </div>
    </div>
    <div class="row" style="margin: 1em;">
        <div class="col-sm-4">
            <label style="margin-top: 2em;">จำนวนชั่วโมงที่อาจารย์จะให้คำปรึกษาเป็นรายบุคคล(ชม./สัปดาห์)</label>
        </div>
        <div class="col-sm">
            <div class="input-group input-group-static">
                <label>ตัวต่อตัว</label>
                <input type="text" class="form-control" placeholder="" value="<?= isset($form_2_component) ? $form_2_component->private : '' ?>" name="private">
            </div>
        </div>
        <div class="col-sm">
            <div class="input-group input-group-static">
                <label>ผ่านเทคโนโลยีสารสนเทศ</label>
                <input type="text" class="form-control" placeholder="" value="<?= isset($form_2_component) ? $form_2_component->technology : '' ?>" name="technology">
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">บันทึก</button>
    </div>
</form>