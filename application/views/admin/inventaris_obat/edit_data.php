<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <a href="<?php echo base_url('iobat') ?>"><i class="fas fa-arrow-left"></i> Back</a>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <p></p>
    <div class="card mb-3">
        <div class="card-header">
            <b class="text-gray-800"><?= $title; ?></b>
        </div>
        <div class="card-body">
            <form action="<?= base_url('iobat/update'); ?>" method="post" id="form_iobat">
                <input type="hidden" name="id" value="<?= $iobat['id_inventaris_obat']; ?>">
                <div class="form-row">
                    <div class="form-group col-sm-2">
                        <label for="nama">Nama <font color="red">*</font></label>
                        <select class="form-control form-control-sm" name="nama" id="nama">
                            <?php foreach ($obat as $row) : ?>
                                <?php if ($row->id_obat == $iobat['id_obat']) : ?>
                                    <option value="<?= $row->id_obat; ?>" selected><?= $row->nama . ' --- ' . $row->satuan . ' --- ' . $row->ukuran; ?></option>
                                <?php else : ?>
                                    <option value="<?= $row->id_obat; ?>"><?= $row->nama . ' --- ' . $row->satuan . ' --- ' . $row->ukuran; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <span id="error_nama" class="text-danger"></span>
                    </div>
                    <div class="form-group col-sm-2">
                        <?php date_default_timezone_set('Asia/Jakarta'); ?>
                        <label>Tanggal Masuk <font color="red">*</font></label>
                        <input class="form-control form-control-sm" type="text" name="tgl_masuk" id="picker" placeholder="Tanggal Masuk" value="<?= $iobat['tgl_masuk'] ?>" /> <small>(tahun-bulan-hari)</small><br />
                        <span id="error_picker" class="text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-2">
                        <?php date_default_timezone_set('Asia/Jakarta'); ?>
                        <label>Expired <font color="red">*</font></label>
                        <input class="form-control form-control-sm" type="text" name="expired" id="datepicker" placeholder="Expired" value="<?= $iobat['expired'] ?>" /> <small>(tahun-bulan-hari)</small><br />
                        <span id="error_datepicker" class="text-danger"></span>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="jumlah_masuk">Jumlah Masuk <font color="red">*</font></label>
                        <input class="form-control form-control-sm" type="text" name="jumlah_masuk" id="jumlah_masuk" placeholder="Jumlah Masuk " value="<?= $iobat['jumlah_masuk'] ?>" onkeypress="javascript:return isNumber(event)" />
                        <span id="error_jumlah_masuk" class="text-danger"></span>
                    </div>
                </div>
                <button class="btn btn-primary" type="button" name="update" id="update">Update</button>
            </form>

        </div>

        <div class="card-footer small text-muted">
            * wajib diisi
        </div>

    </div>
</div>
</div>
<!-- /.container-fluid -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
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
<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
</script>
<script>
    $(document).ready(function() {
        $('#update').click(function() {
            var error_nama = '';
            var error_picker = '';
            var error_datepicker = '';
            var error_jumlah_masuk = '';

            if ($.trim($('#nama').val()).length == 0) {
                error_nama = 'Nama obat wajib diisi';
                $('#error_nama').text(error_nama);
                $('#nama').addClass('has-error');
            } else {
                error_nama = '';
                $('#error_nama').text(error_nama);
                $('#nama').removeClass('has-error');
            }

            if ($.trim($('#picker').val()).length == 0 || $.trim($('#picker').val()) == '____-__-__') {
                error_picker = 'Tanggal masuk wajib diisi';
                $('#error_picker').text(error_picker);
                $('#picker').addClass('has-error');
            } else {
                error_picker = '';
                $('#error_picker').text(error_picker);
                $('#picker').removeClass('has-error');
            }

            if ($.trim($('#datepicker').val()).length == 0 || $.trim($('#datepicker').val()) == '____-__-__') {
                error_datepicker = 'Expired wajib diisi';
                $('#error_datepicker').text(error_datepicker);
                $('#datepicker').addClass('has-error');
            } else {
                error_datepicker = '';
                $('#error_datepicker').text(error_datepicker);
                $('#datepicker').removeClass('has-error');
            }

            if ($.trim($('#jumlah_masuk').val()).length == 0) {
                error_jumlah_masuk = 'Jumlah masuk wajib diisi';
                $('#error_jumlah_masuk').text(error_jumlah_masuk);
                $('#jumlah_masuk').addClass('has-error');
            } else {
                error_jumlah_masuk = '';
                $('#error_jumlah_masuk').text(error_jumlah_masuk);
                $('#jumlah_masuk').removeClass('has-error');
            }

            if (error_nama != '' || error_picker != '' || error_datepicker != '' || error_jumlah_masuk != '') {
                return false;
            } else {
                $('#form_iobat').submit();
            }
        });
    });
</script>