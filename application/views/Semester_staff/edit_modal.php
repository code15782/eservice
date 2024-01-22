<div class="row">
    <div class="col-sm col-form-label-sm">
        <div class="input-group input-group-static">
            <label>เทอม</label>
            <input name="term" class="form-control" type="number" min="1" value="<?= $semesters->term ?>">
        </div>
    </div>
    <div class="col-sm col-form-label-sm">
        <div class="input-group input-group-static">
            <label>ปีการศึกษา</label>
            <input name="year" class="form-control" type="number" min="1" value="<?= $semesters->year ?>">
        </div>
    </div>
    <input name="id" type="hidden" min="1" value="<?= $semesters->id ?>">
</div>