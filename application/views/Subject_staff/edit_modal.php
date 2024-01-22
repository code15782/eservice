<div class="row">
    <div class="mb-4">
        <div class="input-group input-group-static">
            <label>รหัสวิชา</label>
            <input name="code" type="text" class="form-control" value="<?= $subjects->code ?>">
        </div>
    </div>
    <div class="mb-4">
        <div class="input-group input-group-static">
            <label>ชื่อวิชา (ภาษาไทย)</label>
            <input name="name_thai" class="form-control" value="<?= $subjects->name_thai ?>">
        </div>
    </div>
    <div class="mb-4">
        <div class="input-group input-group-static">
            <label> ชื่อวิชา (ภาษาอังกฤษ)</label>
            <input name="name_english" class="form-control" value="<?= $subjects->name_english ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm col-form-label-sm">
        <div class="input-group input-group-static">
            <label>หน่วยกิต</label>
            <input name="unit" class="form-control" value="<?= $subjects->unit ?>" type="number">
        </div>
    </div>
    <div class="col-sm col-form-label-sm">
        <div class="input-group input-group-static">
            <label>ชั่วโมงเรียน</label>
            <input name="time_theory" class="form-control" value="<?= $subjects->time_theory ?>" type="number">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm col-form-label-sm">
        <div class="input-group input-group-static">
            <label>ชั่วโมงปฏิบัติ</label>
            <input name="time_lab" class="form-control" value="<?= $subjects->time_lab ?>" type="number">
        </div>
    </div>
    <div class="col-sm col-form-label-sm">
        <div class="input-group input-group-static">
            <label>ชั่วโมงค้นคว้าด้วยตนเอง</label>
            <input name="time_research" class="form-control" value="<?= $subjects->time_research ?>" type="number">
        </div>
    </div>
</div>
<input name="id" type="hidden" value="<?= $subjects->id ?>">