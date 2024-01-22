<form action="<?= $base_url ?>Edu_form/save/<?= $enroll_id ?>/form_3_elo_mains" method="post" role="form" class="text-center">
    <div class="text-center">
        <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">บันทึก</button>
    </div>
    <!-- ส่วนบน CLO -->
    <div class="text-center">
        <span>ผลการเรียนรู้ที่คาดหวังของรายวิชา (Course Learning Outcome: CLO<sub>s</sub>):</span><br>
    </div>
    <div class="mt-3 mb-5 clo_parent" style="margin: 1em;">
        <div class="clo">
            <div class="row mt-4">
                <div class="col-1">
                    <button type="button" class="btn btn-info" disabled>
                        <span>CLO</span>
                        <span class="clo_number">1</span>
                    </button>
                </div>
                <div class="col-4">
                    <div class="input-group input-group-static">
                        <textarea name="clo1" type="text" class="form-control" rows="2"><?= isset($form_3_elo_main)?$form_3_elo_main->clo1:'' ?></textarea>
                    </div>
                </div>
                <div class="col-5 text-center">
                    <div class="form-check">
                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo1_checkbox_1 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo1_checkbox_1 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo1_checkbox_1" id="ELO1">
                        <label class="custom-control-label checkbox_label" for="ELO1">ELO1</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo2_checkbox_1 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo2_checkbox_1 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo2_checkbox_1" id="ELO2">
                        <label class="custom-control-label checkbox_label" for="ELO2">ELO2</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo3_checkbox_1 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo3_checkbox_1 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo3_checkbox_1" id="ELO3">
                        <label class="custom-control-label checkbox_label" for="ELO3">ELO3</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo4_checkbox_1 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo4_checkbox_1 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo4_checkbox_1" id="ELO4">
                        <label class="custom-control-label checkbox_label" for="ELO4">ELO4</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo5_checkbox_1 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo5_checkbox_1 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo5_checkbox_1" id="ELO5">
                        <label class="custom-control-label checkbox_label" for="ELO5">ELO5</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo6_checkbox_1 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo6_checkbox_1 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo6_checkbox_1" id="ELO6">
                        <label class="custom-control-label checkbox_label" for="ELO6">ELO6</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="clo">
            <div class="row mt-4">
                <div class="col-1">
                    <button type="button" class="btn btn-info" disabled>
                        <span>CLO</span>
                        <span class="clo_number">2</span>
                    </button>
                </div>
                <div class="col-4">
                    <div class="input-group input-group-static">
                        <textarea name="clo2" type="text" class="form-control" rows="2"><?= isset($form_3_elo_main)?$form_3_elo_main->clo2:'' ?></textarea>
                    </div>
                </div>
                <div class="col-5 text-center">
                    <div class="form-check">
                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo1_checkbox_2 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo1_checkbox_2 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo1_checkbox_2" id="ELO1">
                        <label class="custom-control-label checkbox_label" for="ELO1">ELO1</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo2_checkbox_2 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo2_checkbox_2 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo2_checkbox_2" id="ELO2">
                        <label class="custom-control-label checkbox_label" for="ELO2">ELO2</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo3_checkbox_2 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo3_checkbox_2 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo3_checkbox_2" id="ELO3">
                        <label class="custom-control-label checkbox_label" for="ELO3">ELO3</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo4_checkbox_2 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo4_checkbox_2 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo4_checkbox_2" id="ELO4">
                        <label class="custom-control-label checkbox_label" for="ELO4">ELO4</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo5_checkbox_2 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo5_checkbox_2 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo5_checkbox_2" id="ELO5">
                        <label class="custom-control-label checkbox_label" for="ELO5">ELO5</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo6_checkbox_2 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo6_checkbox_2 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo6_checkbox_2" id="ELO6">
                        <label class="custom-control-label checkbox_label" for="ELO6">ELO6</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="clo">
            <div class="row mt-4">
                <div class="col-1">
                    <button type="button" class="btn btn-info" disabled>
                        <span>CLO</span>
                        <span class="clo_number">3</span>
                    </button>
                </div>
                <div class="col-4">
                    <div class="input-group input-group-static">
                        <textarea name="clo3" type="text" class="form-control" rows="2"><?= isset($form_3_elo_main)?$form_3_elo_main->clo3:'' ?></textarea>
                    </div>
                </div>
                <div class="col-5 text-center">
                    <div class="form-check">
                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo1_checkbox_3 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo1_checkbox_3 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo1_checkbox_3" id="ELO1">
                        <label class="custom-control-label checkbox_label" for="ELO1">ELO1</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo2_checkbox_3 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo2_checkbox_3 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo2_checkbox_3" id="ELO2">
                        <label class="custom-control-label checkbox_label" for="ELO2">ELO2</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo3_checkbox_3 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo3_checkbox_3 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo3_checkbox_3" id="ELO3">
                        <label class="custom-control-label checkbox_label" for="ELO3">ELO3</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo4_checkbox_3 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo4_checkbox_3 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo4_checkbox_3" id="ELO4">
                        <label class="custom-control-label checkbox_label" for="ELO4">ELO4</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo5_checkbox_3 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo5_checkbox_3 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo5_checkbox_3" id="ELO5">
                        <label class="custom-control-label checkbox_label" for="ELO5">ELO5</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo6_checkbox_3 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo6_checkbox_3 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo6_checkbox_3" id="ELO6">
                        <label class="custom-control-label checkbox_label" for="ELO6">ELO6</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="clo">
            <div class="row mt-4">
                <div class="col-1">
                    <button type="button" class="btn btn-info" disabled>
                        <span>CLO</span>
                        <span class="clo_number">4</span>
                    </button>
                </div>
                <div class="col-4">
                    <div class="input-group input-group-static">
                        <textarea name="clo4" type="text" class="form-control" rows="2"><?= isset($form_3_elo_main)?$form_3_elo_main->clo4:'' ?></textarea>
                    </div>
                </div>
                <div class="col-5 text-center">
                    <div class="form-check">
                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo1_checkbox_4 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo1_checkbox_4 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo1_checkbox_4" id="ELO1">
                        <label class="custom-control-label checkbox_label" for="ELO1">ELO1</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo2_checkbox_4 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo2_checkbox_4 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo2_checkbox_4" id="ELO2">
                        <label class="custom-control-label checkbox_label" for="ELO2">ELO2</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo3_checkbox_4 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo3_checkbox_4 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo3_checkbox_4" id="ELO3">
                        <label class="custom-control-label checkbox_label" for="ELO3">ELO3</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo4_checkbox_4 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo4_checkbox_4 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo4_checkbox_4" id="ELO4">
                        <label class="custom-control-label checkbox_label" for="ELO4">ELO4</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo5_checkbox_4 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo5_checkbox_4 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo5_checkbox_4" id="ELO5">
                        <label class="custom-control-label checkbox_label" for="ELO5">ELO5</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo6_checkbox_4 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo6_checkbox_4 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo6_checkbox_4" id="ELO6">
                        <label class="custom-control-label checkbox_label" for="ELO6">ELO6</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="clo">
            <div class="row mt-4">
                <div class="col-1">
                    <button type="button" class="btn btn-info" disabled>
                        <span>CLO</span>
                        <span class="clo_number">5</span>
                    </button>
                </div>
                <div class="col-4">
                    <div class="input-group input-group-static">
                        <textarea name="clo5" type="text" class="form-control" rows="2"><?= isset($form_3_elo_main)?$form_3_elo_main->clo5:'' ?></textarea>
                    </div>
                </div>
                <div class="col-5 text-center">
                    <div class="form-check">
                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo1_checkbox_5 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo1_checkbox_5 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo1_checkbox_5" id="ELO1">
                        <label class="custom-control-label checkbox_label" for="ELO1">ELO1</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo2_checkbox_5 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo2_checkbox_5 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo2_checkbox_5" id="ELO2">
                        <label class="custom-control-label checkbox_label" for="ELO2">ELO2</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo3_checkbox_5 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo3_checkbox_5 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo3_checkbox_5" id="ELO3">
                        <label class="custom-control-label checkbox_label" for="ELO3">ELO3</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo4_checkbox_5 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo4_checkbox_5 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo4_checkbox_5" id="ELO4">
                        <label class="custom-control-label checkbox_label" for="ELO4">ELO4</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo5_checkbox_5 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo5_checkbox_5 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo5_checkbox_5" id="ELO5">
                        <label class="custom-control-label checkbox_label" for="ELO5">ELO5</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo6_checkbox_5 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo6_checkbox_5 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo6_checkbox_5" id="ELO6">
                        <label class="custom-control-label checkbox_label" for="ELO6">ELO6</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="clo">
            <div class="row mt-4">
                <div class="col-1">
                    <button type="button" class="btn btn-info" disabled>
                        <span>CLO</span>
                        <span class="clo_number">6</span>
                    </button>
                </div>
                <div class="col-4">
                    <div class="input-group input-group-static">
                        <textarea name="clo6" type="text" class="form-control" rows="2"><?= isset($form_3_elo_main)?$form_3_elo_main->clo6:'' ?></textarea>
                    </div>
                </div>
                <div class="col-5 text-center">
                    <div class="form-check">
                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo1_checkbox_6 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo1_checkbox_6 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo1_checkbox_6" id="ELO1">
                        <label class="custom-control-label checkbox_label" for="ELO1">ELO1</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo2_checkbox_6 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo2_checkbox_6 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo2_checkbox_6" id="ELO2">
                        <label class="custom-control-label checkbox_label" for="ELO2">ELO2</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo3_checkbox_6 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo3_checkbox_6 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo3_checkbox_6" id="ELO3">
                        <label class="custom-control-label checkbox_label" for="ELO3">ELO3</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo4_checkbox_6 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo4_checkbox_6 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo4_checkbox_6" id="ELO4">
                        <label class="custom-control-label checkbox_label" for="ELO4">ELO4</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo5_checkbox_6 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo5_checkbox_6 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo5_checkbox_6" id="ELO5">
                        <label class="custom-control-label checkbox_label" for="ELO5">ELO5</label>

                        <input class="form-check-input cloChange" onchange="onClick(this)" value="<?= isset($form_3_elo_main) ? $form_3_elo_main->elo6_checkbox_6 : "inactive"  ?>" <?= isset($form_3_elo_main) ? $form_3_elo_main->elo6_checkbox_6 == "active" ? "checked" : "" : ""  ?> type="checkbox" name="elo6_checkbox_6" id="ELO6">
                        <label class="custom-control-label checkbox_label" for="ELO6">ELO6</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <span style="color: red">*หากเป็นวิชาบริการให้เลือกกรอก ELO<sub>s</sub> เฉพาะหลักสูตรที่เป็นเจ้าของ Section เท่านั้น ถ้าระบุไม่ได้ให้เว้นไว้</span>

    <!-- ส่วนล่าง ELO -->
    <div class="text-center mt-5">
        <span>ผลการเรียนรู้ที่คาดหวังของรายวิชา (Course Learning Outcome: ELO<sub style="margin-top: 5%;">s</sub>):</span><br>
    </div>
    <div class="mt-3 mb-5 elo_parent" style="margin: 1em;">
        <div class="elo">
            <div class="row">

                <div class="col-1">
                    <button type="button" class="btn btn-info" disabled>
                        <span>ELO</span>
                        <span class="elo_number">1</span>
                    </button>
                </div>
                <div class="col-9">
                    <div class="input-group input-group-static">
                        <textarea name="elo1" type="text" class="form-control" rows="2"><?= isset($form_3_elo_main)?$form_3_elo_main->elo1:'' ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="elo">
            <div class="row">

                <div class="col-1">
                    <button type="button" class="btn btn-info" disabled>
                        <span>ELO</span>
                        <span class="elo_number">2</span>
                    </button>
                </div>
                <div class="col-9">
                    <div class="input-group input-group-static">
                        <textarea name="elo2" type="text" class="form-control" rows="2"><?= isset($form_3_elo_main)?$form_3_elo_main->elo2:'' ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="elo">
            <div class="row">

                <div class="col-1">
                    <button type="button" class="btn btn-info" disabled>
                        <span>ELO</span>
                        <span class="elo_number">3</span>
                    </button>
                </div>
                <div class="col-9">
                    <div class="input-group input-group-static">
                        <textarea name="elo3" type="text" class="form-control" rows="2"><?= isset($form_3_elo_main)?$form_3_elo_main->elo3:'' ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="elo">
            <div class="row">

                <div class="col-1">
                    <button type="button" class="btn btn-info" disabled>
                        <span>ELO</span>
                        <span class="elo_number">4</span>
                    </button>
                </div>
                <div class="col-9">
                    <div class="input-group input-group-static">
                        <textarea name="elo4" type="text" class="form-control" rows="2"><?= isset($form_3_elo_main)?$form_3_elo_main->elo4:'' ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="elo">
            <div class="row">

                <div class="col-1">
                    <button type="button" class="btn btn-info" disabled>
                        <span>ELO</span>
                        <span class="elo_number">5</span>
                    </button>
                </div>
                <div class="col-9">
                    <div class="input-group input-group-static">
                        <textarea name="elo5" type="text" class="form-control" rows="2"><?= isset($form_3_elo_main)?$form_3_elo_main->elo5:'' ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="elo">
            <div class="row">

                <div class="col-1">
                    <button type="button" class="btn btn-info" disabled>
                        <span>ELO</span>
                        <span class="elo_number">6</span>
                    </button>
                </div>
                <div class="col-9">
                    <div class="input-group input-group-static">
                        <textarea name="elo6" type="text" class="form-control" rows="2"><?= isset($form_3_elo_main)?$form_3_elo_main->elo6:'' ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>