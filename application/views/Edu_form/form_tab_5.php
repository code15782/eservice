<form action="<?= $base_url ?>Edu_form/save/<?= $enroll_id ?>/form_5_resources" method="post" role="form" class="text-center">
    <div class="row" style="margin: 1em;">
        <div class="col-4">
            <label style="margin-top: 2em;">ตำราและเอกสารหลักที่กำหนด</label>
        </div>
        <div class="col-8">
            <div class="input-group input-group-static">
                <textarea type="text" class="form-control" name="must"><?= isset($form_5_resource) ? $form_5_resource->must : '' ?></textarea>
            </div>
        </div>
    </div>
    <div class="row" style="margin: 1em;">
        <div class="col-4">
            <label style="margin-top: 2em;">เอกสารและข้อมูลอื่นๆที่แนะนำ</label>
        </div>
        <div class="col-8">
            <div class="input-group input-group-static">
                <textarea type="text" class="form-control" name="order"><?= isset($form_5_resource) ? $form_5_resource->order : '' ?></textarea>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">บันทึก</button>
    </div>
</form>