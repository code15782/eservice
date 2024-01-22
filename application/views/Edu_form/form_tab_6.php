<form action="<?= $base_url ?>Edu_form/save/<?= $enroll_id ?>/form_6_assesses" method="post" role="form" class="text-center">
    <div class="row" style="margin: 1em;">
        <div class="col-sm-4">
            <label>กลยุทธ์การประเมินประสิทธิผลโดยนักศึกษา</label>
        </div>
        <div class="col-sm">
            <div class="row">
                <div class="text-start">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_student_1 == "active" ? "checked" : "" : ""  ?> id="check_1" name="by_student_1">
                        <label class="form-check-label" for="check_1">
                            แบบประเมินรายวิชา
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_student_2 == "active" ? "checked" : "" : ""  ?> id="check_2" name="by_student_2">
                        <label class="form-check-label" for="check_2">
                            การสนทนากลุ่มระหว่างผู้สอนและผู้เรียน
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_student_3 == "active" ? "checked" : "" : ""  ?> id="check_3" name="by_student_3">
                        <label class="form-check-label" for="check_3">
                            การสะท้อนความคิด จากพฤติกรรมของผู้เรียน
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_student_4 == "active" ? "checked" : "" : ""  ?> id="check_4" name="by_student_4">
                        <label class="form-check-label" for="check_4">
                            ข้อเสนอแนะผ่านทางช่องทางออนไลน์ ที่อาจารย์ผู้สอนได้จัดทำเป็นช่องทางการสื่อสารกับนักศึกษา
                        </label>
                    </div>
                    <div class="form-check">
                        <div class="d-flex justify-content-start">
                            <div>
                                <input class="form-check-input" type="checkbox" value="active" id="check_5" <?= isset($form_6_assesse) ? $form_6_assesse->by_student_5 != "" ? "checked" : "" : ""  ?>>
                            </div>
                            <div>
                                <label class="form-check-label" for="check_5">
                                    อื่นๆ (ระบุ)
                                </label>
                            </div>
                        </div>
                        <textarea name="by_student_5"><?= isset($form_6_assesse) ? $form_6_assesse->by_student_5 : '' ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin: 1em;">
        <div class="col-sm-4">
            <label>กลยุทธ์การประเมินการสอน</label>
        </div>
        <div class="col-sm">
            <div class="row">
                <div class="text-start">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_assess_1 == "active" ? "checked" : "" : ""  ?> id="check_5" name="by_assess_1">
                        <label class="form-check-label" for="check_5">
                            แบบประเมินผู้สอนโดยนักศึกษา
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_assess_2 == "active" ? "checked" : "" : ""  ?> id="check_6" name="by_assess_2">
                        <label class="form-check-label" for="check_6">
                            ผลการทดสอบ
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_assess_3 == "active" ? "checked" : "" : ""  ?> id="check_7" name="by_assess_3">
                        <label class="form-check-label" for="check_7">
                            การทวนสอบผลประเมินผลลัพธ์การเรียนรู้
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_assess_4 == "active" ? "checked" : "" : ""  ?> id="check_8" name="by_assess_4">
                        <label class="form-check-label" for="check_8">
                            การประเมินโดยคณะกรรมการประเมินข้อสอบ
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_assess_5 == "active" ? "checked" : "" : ""  ?> id="check_9" name="by_assess_5">
                        <label class="form-check-label" for="check_9">
                            การสังเกตการณ์สอยของผู้ร่วมทีมการสอน
                        </label>
                    </div>
                    <div class="form-check">
                        <div class="d-flex justify-content-start">
                            <div>
                                <input class="form-check-input" type="checkbox" value="active" id="check_10" <?= isset($form_6_assesse) ? $form_6_assesse->by_assess_6 != "" ? "checked" : "" : ""  ?>>
                            </div>
                            <div>
                                <label class="form-check-label" for="check_10">
                                    อื่นๆ (ระบุ)
                                </label>
                            </div>
                        </div>
                        <textarea name="by_assess_6"><?= isset($form_6_assesse) ? $form_6_assesse->by_assess_6 : '' ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin: 1em;">
        <div class="col-sm-4">
            <label>การปรับปรุงการสอน</label>
        </div>
        <div class="col-sm">
            <div class="row">
                <div class="text-start">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_fix_1 == "active" ? "checked" : "" : ""  ?> id="check_11" name="by_fix_1">
                        <label class="form-check-label" for="check_11">
                            สัมนาการจัดการเรียนการสอน
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_fix_2 == "active" ? "checked" : "" : ""  ?> id="check_12" name="by_fix_2">
                        <label class="form-check-label" for="check_12">
                            การวิจัยในและนอกชั้นเรียน
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_fix_3 == "active" ? "checked" : "" : ""  ?> id="check_13" name="by_fix_3">
                        <label class="form-check-label" for="check_13">
                            กิจกรรมแลกเปลี่ยนความรู้ / เทคนิคการสอน Coffee Break
                        </label>
                    </div>
                    <div class="form-check">
                        <div class="d-flex justify-content-start">
                            <div>
                                <input class="form-check-input" type="checkbox" value="active" id="check_14" <?= isset($form_6_assesse) ? $form_6_assesse->by_fix_4 != "" ? "checked" : "" : ""  ?>>
                            </div>
                            <div>
                                <label class="form-check-label" for="check_14">
                                    อื่นๆ (ระบุ)
                                </label>
                            </div>
                        </div>
                        <textarea name="by_fix_4"><?= isset($form_6_assesse) ? $form_6_assesse->by_fix_4 : '' ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin: 1em;">
        <div class="col-sm-4">
            <label>การทวนสอบผลการเรียนรู้ที่คาดหวังของรายวิชานักศึกษา</label>
        </div>
        <div class="col-sm">
            <div class="row">
                <div class="text-start">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_research_1 == "active" ? "checked" : "" : ""  ?> id="check_15" name="by_research_1">
                        <label class="form-check-label" for="check_15">
                            มีการตั้งคณะกรรมการในสาขาวิชาตรวจสอบผลการประเมินผลการเรียนรู้ที่คาดหวังของรายวิชา โดยตรวจสอบข้อสอบ <br>
                            งานที่ได้รับมอบหมาย วิธีการให้คะแนนสอบ และการให้คะแนนพฤติกรรม
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_research_2 == "active" ? "checked" : "" : ""  ?> id="check_16" name="by_research_2">
                        <label class="form-check-label" for="check_16">
                            การทบทวนการให้คะแนนการตรวจผลงานของนักศึกษาโดยกรรมการวิชาการประจำภาควิชาและคณะ
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_research_3 == "active" ? "checked" : "" : ""  ?> id="check_17" name="by_research_3">
                        <label class="form-check-label" for="check_17">
                            การทวนสอบการให้คะแนนจากการสุ่มตรวจผลงานของนักศึกษาโดยอาจารย์หรือผู้ทรงคุณวุฒิอื่นๆ ที่ไม่ใช่อาจารย์ประจำหลักสูตร
                        </label>
                    </div>
                    <div class="form-check">
                        <div class="d-flex justify-content-start">
                            <div>
                                <input class="form-check-input" type="checkbox" value="active" id="check_18" <?= isset($form_6_assesse) ? $form_6_assesse->by_research_4 != "" ? "checked" : "" : ""  ?>>
                            </div>
                            <div>
                                <label class="form-check-label" for="check_18">
                                    อื่นๆ (ระบุ)
                                </label>
                            </div>
                        </div>
                        <textarea name="by_research_4"><?= isset($form_6_assesse) ? $form_6_assesse->by_research_4 : '' ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin: 1em;">
        <div class="col-sm-4">
            <label>การดำเนินการทบทวนและวางแผนการปรับปรุงประสิทธิผลของรายวิชา</label>
        </div>
        <div class="col-sm">
            <div class="row">
                <div class="text-start">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_ressult_1 == "active" ? "checked" : "" : ""  ?> id="check_19" name="by_ressult_1">
                        <label class="form-check-label" for="check_19">
                            ปรับปรุงรายวิชาในแต่ละปีตามข้อเสนอและผลการทวนสอบ
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="active" <?= isset($form_6_assesse) ? $form_6_assesse->by_ressult_2 == "active" ? "checked" : "" : ""  ?> id="check_20" name="by_ressult_2">
                        <label class="form-check-label" for="check_20">
                            ปรับปรุงรายวิชาในแต่ละปีตามผลการประเมินผู้สอนโดยนักศึกษา
                        </label>
                    </div>
                    <div class="form-check">
                        <div class="d-flex justify-content-start">
                            <div>
                                <input class="form-check-input" type="checkbox" value="active" id="check_21" <?= isset($form_6_assesse) ? $form_6_assesse->by_ressult_3 != "" ? "checked" : "" : ""  ?>>
                            </div>
                            <div>
                                <label class="form-check-label" for="check_21">
                                    อื่นๆ (ระบุ)
                                </label>
                            </div>
                        </div>
                        <textarea name="by_ressult_3"><?= isset($form_6_assesse) ? $form_6_assesse->by_ressult_3 : '' ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">บันทึก</button>
    </div>
</form>