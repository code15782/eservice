<div class="container-fluid d-flex justify-content-center align-self-center position-absolute top-50 start-50 translate-middle">
    <div class="col-xl-4 col-md-6 col-sm-12">
        <form action="<?= $base_url ?>Authen/login" method="post" role="form" class="text-center">
            <img src="<?= $base_url ?>pictures/logo_major.jpg" class="rounded mx-auto d-block" style="max-height: 400px;max-width: 400px;">
            <div class="input-group input-group-outline my-3">
                <label class="form-label">ชื่อผู้ใช้งาน</label>
                <input name="username" type="text" class="form-control">
            </div>
            <div class="input-group input-group-outline mb-3">
                <label class="form-label">รหัสผ่าน</label>
                <input name="password" type="password" class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">เข้าสู่ระบบ</button>
        </form>

        <a type="button" href="<?= $base_url ?>" class="btn bg-gradient-secondary w-100 my-4 mb-2">ย้อนกลับ</a>
    </div>
</div>
</div>

<style>
    html {
        background-color: #ffff;
    }
</style>
<?php
if ($message = $this->session->flashdata('authen_failed')) {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: '<?= $message ?>',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php
}
?>
