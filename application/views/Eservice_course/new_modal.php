<div class="row">
    <div class="mb-4">
        <div class="input-group input-group-static">
            <label>ชื่อหลักสูตร</label>
            <input name="name" class="form-control">
        </div>
    </div>
    <div class="col-6 mb-4">
        <select class="form-select" name="subject_id">
            <option selected disabled>ชื่อรายวิชา</option>
            <?php
            foreach ($subjects as $sub) {
            ?>
                <option value="<?= $sub->id ?>"><?= $sub->name_thai ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="col-6 mb-4">
        <select class="form-select" name="category_id">
            <option selected disabled>หมวดหมู่</option>
            <?php
            foreach ($categories as $cat) {
            ?>
                <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="col-6 mb-4">
        <select class="form-select" name="semester_id">
            <option selected disabled>ภาคการศึกษา/ปีการศึกษา</option>
            <?php
            foreach ($semesters as $sem) {
            ?>
                <option value="<?= $sem->id ?>"><?= $sem->term ?> / <?= $sem->year ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="mb-4">
        <div class="input-group input-group-static">
            <label>ภาค</label>
            <input name="section_id" class="form-control" value="<?= $section[0]->id  ?>" hidden>
            <input class="form-control" value="<?= $section[0]->name  ?>" disabled>
        </div>
    </div>
</div>