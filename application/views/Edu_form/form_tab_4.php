<form id="save_tab4" action="<?= $base_url ?>Edu_form/save_tab4/<?= $enroll_id ?>" method="post" role="form" class="text-center">
    <div class="text-center">
        <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">บันทึก</button>
    </div>
    <?php
    for ($i = 0; $i < 20; $i++) {
    ?>
        <div class="row" style="margin: 1em;">
            <div class="col-sm-1" style="margin-left:-3rem;">
                <label class="text-center">สัปดาห์:</label>
                <div class="text-center">
                    <p class="text-center"><?= $i + 1  ?></p>
                    <input type="hidden" name="week[]" value="<?= $i + 1  ?>">
                </div>
            </div>
            <div class="col-sm-2">
                <label class="text-center">หัวข้อรายละเอียด:</label>
                <div class="input-group input-group-static mb-4">
                    <textarea class="form-control" type="text" rows="1" name="title[]"><?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->title : '' ?></textarea>
                </div>
            </div>
            <div class="col-sm-1">
                <label class="text-center">ชั่วโมง:</label>
                <div class="input-group input-group-static mb-4">
                    <textarea class="form-control" type="text" rows="1" name="time[]"><?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->time : '' ?></textarea>
                </div>
            </div>
            <div class="col-sm-3">
                <label class="text-center">กิจกรรมการเรียนการสอนและสื่อที่ใช้:</label>
                <div class="input-group input-group-static mb-4">
                    <textarea class="form-control" type="text" rows="1" name="activity_1[]"><?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->activity_1 : '' ?></textarea>
                </div>
            </div>
            <div class="col-sm-2">
                <label class="text-center">CLO:</label>
                <div class="form-check">
                    <input class="form-check-input clo1" onchange="onClick(this)" value="<?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->clo1 : "inactive"  ?>" type="checkbox" name="clo1[]" <?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->clo1 == "active" ? "checked" : "" : ""  ?>>
                    <label class="custom-control-label checkbox_label" for="CLO1">1</label>

                    <input class="form-check-input clo2" onchange="onClick(this)" value="<?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->clo2 : "inactive"  ?>" type="checkbox" name="clo2[]" <?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->clo2 == "active" ? "checked" : "" : ""  ?>>
                    <label class="custom-control-label checkbox_label" for="CLO2">2</label>

                    <input class="form-check-input clo3" onchange="onClick(this)" value="<?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->clo3 : "inactive"  ?>" type="checkbox" name="clo3[]" <?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->clo3 == "active" ? "checked" : "" : ""  ?>>
                    <label class="custom-control-label checkbox_label" for="CLO3">3</label>

                    <input class="form-check-input clo4" onchange="onClick(this)" value="<?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->clo4 : "inactive"  ?>" type="checkbox" name="clo4[]" <?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->clo4 == "active" ? "checked" : "" : ""  ?>>
                    <label class="custom-control-label checkbox_label" for="CLO4">4</label>

                    <input class="form-check-input clo5" onchange="onClick(this)" value="<?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->clo5 : "inactive"  ?>" type="checkbox" name="clo5[]" <?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->clo5 == "active" ? "checked" : "" : ""  ?>>
                    <label class="custom-control-label checkbox_label" for="CLO5">5</label>

                    <input class="form-check-input clo6" onchange="onClick(this)" value="<?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->clo6 : "inactive"  ?>" type="checkbox" name="clo6[]" <?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->clo6 == "active" ? "checked" : "" : ""  ?>>
                    <label class="custom-control-label checkbox_label" for="CLO6">6</label>
                </div>
            </div>
            <div class="col-sm-3">
                <label class="text-center">กิจกรรมการประเมิน/วัดผลการเรียนรู้:</label>
                <div class="input-group input-group-static mb-4">
                    <textarea class="form-control" type="text" rows="1" name="activity_2[]"><?= isset($form_4_plan[$i]) ? $form_4_plan[$i]->activity_2 : '' ?></textarea>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="row">
        <div class="col-5">
            <span>สัดส่วนในการประเมิน: กลางภาค / ปลายภาค / งานที่ได้รับมอบหมาย / อื่น ๆ:</span>
            <!-- <span class="d-flex justify-content-end"></span> -->
        </div>
        <div class="col-1">
            <div class="input-group input-group-static">
                <input value="<?= isset($form_4_plan[0]) ? $form_4_plan[0]->percent_1 : '' ?>" type="number" min="0" max="100" class="form-control" name="percent_1">
            </div>
        </div>
        <div class="col-1">
            <div class="input-group input-group-static">
                <input value="<?= isset($form_4_plan[0]) ? $form_4_plan[0]->percent_2 : '' ?>" type="number" min="0" max="100" class="form-control" name="percent_2">
            </div>
        </div>
        <div class="col-1">
            <div class="input-group input-group-static">
                <input value="<?= isset($form_4_plan[0]) ? $form_4_plan[0]->percent_3 : '' ?>" type="number" min="0" max="100" class="form-control" name="percent_3">
            </div>
        </div>
        <div class="col-1">
            <div class="input-group input-group-static">
                <input value="<?= isset($form_4_plan[0]) ? $form_4_plan[0]->percent_4 : '' ?>" type="number" min="0" max="100" class="form-control" name="percent_4">
            </div>
        </div>
    </div>
</form>

<style>
    .checkbox_label {
        margin-right: 2%;
        margin-left: -1%;
    }
</style>