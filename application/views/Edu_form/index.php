<script>
    const onClick = (input) => {
        console.log(input)
        console.log(input.value)
        if (input.value == 'active') {
            input.value = 'inactive'
        } else {
            input.value = 'active'
        }
    }
    $(function() {
        $(document).submit(function(e) {
            $('input.clo1').attr('type', 'text');
            $('input.clo2').attr('type', 'text');
            $('input.clo3').attr('type', 'text');
            $('input.clo4').attr('type', 'text');
            $('input.clo5').attr('type', 'text');
            $('input.clo6').attr('type', 'text');
            $('input.cloChange').attr('type', 'text');
        });
    });
</script>
<div class="col-12">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="col-12 nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true">ข้อมูลทั่วไป</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="col-12 nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false">ส่วนประกอบของรายวิชา</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3" aria-selected="false">การพัฒนาผลการเรียนรู้ที่คาดหวังของนักศึกษา</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="col-12 nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4" aria-selected="true">แผนการสอนและการประเมิน</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="col-12 nav-link" id="pills-5-tab" data-bs-toggle="pill" data-bs-target="#pills-5" type="button" role="tab" aria-controls="pills-5" aria-selected="false">ทรัพยากรการเรียนการสอน</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-6-tab" data-bs-toggle="pill" data-bs-target="#pills-6" type="button" role="tab" aria-controls="pills-6" aria-selected="false">การประเมินรายวิชาและกระบวนการปรับปรุง</button>
        </li>
    </ul>
    <!-- <form action="<?= $base_url ?>Authen/login" method="post" role="form" class="text-center"> -->
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                <?= $this->load->view('Edu_form/form_tab_1', [], true); ?>
            </div>
            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                <?= $this->load->view('Edu_form/form_tab_2', [], true); ?>
            </div>
            <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                <?= $this->load->view('Edu_form/form_tab_3', [], true); ?>
            </div>
            <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                <?= $this->load->view('Edu_form/form_tab_4', [], true); ?>
            </div>
            <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
                <?= $this->load->view('Edu_form/form_tab_5', [], true); ?>
            </div>
            <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab">
                <?= $this->load->view('Edu_form/form_tab_6', [], true); ?>
            </div>
        </div>
</div>