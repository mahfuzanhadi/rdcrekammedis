<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <a href="<?php echo base_url('perawat') ?>"><i class="fas fa-arrow-left"></i> Back</a>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <div class="card my-2">
        <div class="card-header">
            <b class="text-gray-800"><?= $title; ?></b>
        </div>
        <div class="card-body">
            <form action="<?= base_url('perawat/update'); ?>" method="post" id="form_perawat">
                <input type="hidden" name="id" value="<?= $perawat['id_perawat']; ?>">
                <div class="form-row">
                    <div class="form-group col-sm-3">
                        <label for="name">Nama <font color="red">*</font></label>
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama" value="<?= $perawat['nama'] ?>" />
                        <span id="error_nama" class="text-danger"></span>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="alamat">Alamat <font color="red">*</font></label>
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat"><?= $perawat['alamat'] ?></textarea>
                        <span id="error_alamat" class="text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-3">
                        <label for="tempat_lahir">Tempat Lahir <font color="red">*</font></label>
                        <input class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?= $perawat['tempat_lahir'] ?>" />
                        <span id="error_tempat_lahir" class="text-danger"></span>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="tanggal_lahir">Tanggal Lahir <font color="red">*</font></label>
                        <input class="form-control" type="text" name="tanggal_lahir" id="picker" placeholder="Tanggal Lahir" value="<?= $perawat['tanggal_lahir'] ?>" /> <small>(tahun-bulan-hari)</small><br />
                        <span id="error_picker" class="text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-3">
                        <label for="jenis_kelamin">Jenis Kelamin <font color="red">*</font></label>
                        <select class="custom-select custom-select-sm" name="jenis_kelamin" id="jenis_kelamin">
                            <?php if ($perawat['jenis_kelamin'] == 1) : ?>
                                <option value="1" selected>Laki-laki</option>
                                <option value="2">Perempuan</option>
                            <?php else : ?>
                                <option value="1">Laki-laki</option>
                                <option value="2" selected>Perempuan</option>
                            <?php endif; ?>
                        </select>
                        <span id="error_jenis_kelamin" class="text-danger"></span>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="email">E-mail <font color="red">*</font></label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="E-mail" value="<?= $perawat['email'] ?>" />
                        <span id="error_email" class="text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-3">
                        <label for="no_telp">No. Telp</label>
                        <input class="form-control" type="text" name="no_telp" id="no_telp" placeholder="No. Telp" value="<?= $perawat['no_telp'] ?>" onkeypress="javascript:return isNumber(event)" />
                        <span id="error_no_telp" class="text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-3">
                        <label for="no_str">No. STR</label>
                        <input class="form-control" type="text" name="no_str" placeholder="No. STR" value="<?= $perawat['no_str'] ?>" />
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="tanggal_berlaku_str">Tanggal Berlaku STR</label>
                        <input class="form-control" type="text" name="tanggal_berlaku_str" id="datepicker" placeholder="Tanggal Berlaku STR" value="<?= $perawat['tanggal_berlaku_str'] ?>" /> <small>(tahun-bulan-hari)</small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-3">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username" value="<?= $perawat['username'] ?>" />
                        <span id="error_username" class="text-danger"></span>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" autocomplete="new-password" />
                        <span id="error_password" class="text-danger"></span>
                        <input type="hidden" value="<?= $perawat['password'] ?>" name="password2" />
                    </div>
                    <div class="form-group col-sm-3">
                        <input type="checkbox" class="form-checkbox" style="margin-top: 40px"> Show password
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-3">
                        <label for="status">Status <font color="red">*</font></label>
                        <select class="custom-select custom-select-sm" name="status" id="status">
                            <?php if ($perawat['status'] == 1) : ?>
                                <option value="1" selected>Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            <?php else : ?>
                                <option value="1">Aktif</option>
                                <option value="0" selected>Tidak Aktif</option>
                            <?php endif; ?>
                        </select>
                        <span id="error_status" class="text-danger"></span>
                    </div>
                </div>
                <button class="btn btn-primary active" aria-pressed="true" type="button" name="update" id="update">Update</button>
            </form>

        </div>

        <div class="card-footer small text-muted">
            <font color="red">*</font> wajib diisi
        </div>

    </div>
</div>
</div>
<!-- /.container-fluid -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

<!-- SCRIPT DATETIME PICKER -->
<script>
    jQuery.datetimepicker.setLocale('id')
    $('#picker').datetimepicker({
        timepicker: false,
        datepicker: true,
        format: 'Y-m-d', // formatDate
        mask: true,
        lang: 'id',
        il8n: {
            month: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            dayOfWeek: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
        }
    })
</script>

<!-- SCRIPT DATETIME PICKER -->
<script>
    jQuery.datetimepicker.setLocale('id')
    $('#datepicker').datetimepicker({
        timepicker: false,
        datepicker: true,
        format: 'Y-m-d', // formatDate
        mask: true,
        lang: 'id',
        il8n: {
            month: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            dayOfWeek: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
        }
    })
</script>

<!-- SCRIPT INPUT NUMBER ONLY -->
<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
</script>

<!-- SCRIPT CEK USERNAME EXIST -->
<script>
    $(document).ready(function() {
        $('#username').keyup(function() {
            var username = $('#username').val();
            var uname = '<?php echo $perawat['username'] ?>';
            if (username != '' && username != uname) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>perawat/isExist",
                    data: "username=" + username,
                    success: function(response) {
                        if (response != '') {
                            $('#error_username').text(response);
                            $('#username').addClass('has-error');
                            $('#update').attr('disabled', true);
                        } else {
                            error_username = response;
                            $('#error_username').text(error_username);
                            $('#username').removeClass('has-error');
                            $('#update').removeAttr('disabled');
                        }
                    }
                });
            } else if (username == uname) {
                var error_username = '';
                $('#error_username').text(error_username);
                $('#username').removeClass('has-error');
                $('#update').removeAttr('disabled');
            } else {
                var error_username = '';
                $('#error_username').text(error_username);
                $('#username').removeClass('has-error');
                $('#update').removeAttr('disabled');
            }
        });
    });
</script>

<!-- SCRIPT SHOW/HIDE PASSWORD -->
<script>
    $(document).ready(function() {
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        })
    })
</script>

<!-- SCRIPT FORM VALIDATION -->
<script>
    $(document).ready(function() {
        $('#update').click(function() {
            var error_nama = '';
            var error_alamat = '';
            var error_tempat_lahir = '';
            var error_picker = '';
            var error_jenis_kelamin = '';
            var error_no_telp = '';
            var error_email = '';
            var error_username = '';
            var error_password = '';
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var mobile_validation = /^\d{10,12}$/;
            var password_validation = /^.{6,}$/;

            if ($.trim($('#nama').val()).length == 0) {
                error_nama = 'Nama wajib diisi';
                $('#error_nama').text(error_nama);
                $('#nama').addClass('has-error');
            } else {
                error_nama = '';
                $('#error_nama').text(error_nama);
                $('#nama').removeClass('has-error');
            }

            if ($.trim($('#alamat').val()).length == 0) {
                error_alamat = 'Alamat wajib diisi';
                $('#error_alamat').text(error_alamat);
                $('#alamat').addClass('has-error');
            } else {
                error_alamat = '';
                $('#error_alamat').text(error_alamat);
                $('#alamat').removeClass('has-error');
            }

            if ($.trim($('#tempat_lahir').val()).length == 0) {
                error_tempat_lahir = 'Tempat Lahir wajib diisi';
                $('#error_tempat_lahir').text(error_tempat_lahir);
                $('#tempat_lahir').addClass('has-error');
            } else {
                error_tempat_lahir = '';
                $('#error_tempat_lahir').text(error_tempat_lahir);
                $('#tempat_lahir').removeClass('has-error');
            }

            if ($.trim($('#picker').val()).length == 0 || $.trim($('#picker').val()) == '____-__-__') {
                error_picker = 'Tanggal Lahir wajib diisi';
                $('#error_picker').text(error_picker);
                $('#picker').addClass('has-error');
            } else {
                error_picker = '';
                $('#error_picker').text(error_picker);
                $('#picker').removeClass('has-error');
            }

            if ($.trim($('#jenis_kelamin').val()).length == 0) {
                error_jenis_kelamin = 'Jenis Kelamin wajib diisi';
                $('#error_jenis_kelamin').text(error_jenis_kelamin);
                $('#jenis_kelamin').addClass('has-error');
            } else {
                error_jenis_kelamin = '';
                $('#error_jenis_kelamin').text(error_jenis_kelamin);
                $('#jenis_kelamin').removeClass('has-error');
            }

            if ($.trim($('#no_telp').val()).length == 0) {
                error_no_telp = '';
                $('#error_no_telp').text(error_no_telp);
                $('#no_telp').removeClass('has-error');
            } else {
                if (!mobile_validation.test($('#no_telp').val())) {
                    error_no_telp = 'Mohon masukkan no telp yang valid';
                    $('#error_no_telp').text(error_no_telp);
                    $('#no_telp').addClass('has-error');
                } else {
                    error_no_telp = '';
                    $('#error_no_telp').text(error_no_telp);
                    $('#no_telp').removeClass('has-error');
                }
            }

            if ($.trim($('#email').val()).length == 0) {
                error_email = 'Email wajib diisi';
                $('#error_email').text(error_email);
                $('#email').addClass('has-error');
            } else {
                if (!filter.test($('#email').val())) {
                    error_email = 'Mohon masukkan email yang valid';
                    $('#error_email').text(error_email);
                    $('#email').addClass('has-error');
                } else {
                    error_email = '';
                    $('#error_email').text(error_email);
                    $('#email').removeClass('has-error');
                }
            }

            if ($.trim($('#password').val()).length == 0) {
                error_password = '';
                $('#error_password').text(error_password);
                $('#password').removeClass('has-error');
            } else {
                if (!password_validation.test($('#password').val())) {
                    error_password = 'Password harus berisi minimal 6 karakter';
                    $('#error_password').text(error_password);
                    $('#password').addClass('has-error');
                } else {
                    error_password = '';
                    $('#error_password').text(error_password);
                    $('#password').removeClass('has-error');
                }
            }

            if (error_nama != '' || error_alamat != '' || error_picker != '' || error_jenis_kelamin != '' || error_no_telp != '' || error_email != '' || error_password != '') {
                return false;
            } else {
                $('#form_perawat').submit();
            }
        });
    });
</script>