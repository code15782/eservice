<div class="row">
    <input type="hidden" name="copy_enroll_id" value="<?= $copy_enroll->id ?>">
    <div class="col-12 col-form-label-sm">
        <select class="form-select" aria-label="Default select example" name="course_target_id">
            <option selected disabled>&nbsp; ปีการศึกษาปลายทาง</option>
            <?php
                foreach ($course_by_copy_subjects as $course_by_copy_subject) {
            ?>
                <option value="<?= $course_by_copy_subject->id ?>">&nbsp; ปีการศึกษา <?= $course_by_copy_subject->term ?>/<?= $course_by_copy_subject->year ?> (<?= $course_by_copy_subject->course_name ?> <?= $course_by_copy_subject->category_name ?>)</option>
            <?php

                }
            ?>
        </select>
    </div>
</div>