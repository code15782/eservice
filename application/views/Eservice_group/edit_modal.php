<div class="row">
    <div class="mb-4">
        <div class="input-group input-group-static">
            <label>ชื่อ มคอ.</label>
            <input name="name" type="text" class="form-control" value="<?= $categories->name ?>">
        </div>
    </div>
    <div class="mb-4">
        <div class="input-group input-group-static">
            <label>หมายเหตุ</label>
            <input name="description" class="form-control" value="<?= $categories->description ?>">
        </div>
    </div>
    <input name="id" type="hidden" min="1" value="<?= $categories->id ?>">
</div>