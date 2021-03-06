<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <a href="<?php echo base_url('transaksi') ?>"><i class="fas fa-arrow-left"></i> Back</a>

    <div class="card my-2">
        <div class="card-header">
            <b class="text-gray-800"><?= $title; ?></b>
        </div>
        <div class="card-body">
            <?php foreach ($pasien as $row) : ?>
                <?php if ($row->id_pasien == $transaksi['id_pasien']) : ?>
                    <div class="row">
                        <div class="col-sm-3">
                            <p><strong>No. Rekam Medis</strong> : <?= $row->no_rekam_medis; ?></p>
                        </div>
                        <div class="col-sm-3">
                            <p><strong>Alamat</strong> : <?= $row->alamat; ?></p>
                        </div>
                        <div class="col-sm-3">
                            <p><strong>Pekerjaan</strong> : <?= $row->pekerjaan; ?></p>
                        </div>
                        <div class="col-sm-3">
                            <p><strong>Riwayat Penyakit</strong> :
                                <?php if ($row->riwayat_penyakit != '') {
                                    echo $row->riwayat_penyakit;
                                } else {
                                    echo '-';
                                } ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p><strong>Nama Pasien</strong> : <?= $row->nama; ?></p>
                        </div>
                        <div class="col-sm-3">
                            <?php
                            $tanggal_lahir = $row->tanggal_lahir;
                            $dob = new DateTime($tanggal_lahir);
                            $now = new DateTime();
                            $difference = $now->diff($dob);
                            $age = $difference->y;
                            $umur = floor((time() - strtotime($tanggal_lahir)) / 31556926);
                            $age = intval($umur);
                            ?>
                            <p><strong>Umur</strong> : <?= $age; ?> tahun</p>
                        </div>
                        <div class="col-sm-3">
                            <p><strong>No. telp</strong> : <?= $row->no_telp; ?></p>
                        </div>
                        <div class="col-sm-3">
                            <p><strong>Alergi Obat</strong> :
                                <?php if ($row->alergi_obat != '') {
                                    echo $row->alergi_obat;
                                } else {
                                    echo '-';
                                } ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <hr style="border: 1px solid #e0e0e0; border-radius: 5px;">
            <div class="row">
                <div class="col-sm-3">
                    <?php foreach ($dokter as $row) : ?>
                        <?php if ($row->id_dokter == $transaksi['id_dokter']) : ?>
                            <p><strong>Dokter</strong> : <?= $row->nama; ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="col-sm-3">
                    <?php foreach ($perawat as $row) : ?>
                        <?php if ($row->id_perawat == $transaksi['id_perawat']) : ?>
                            <p><strong>Perawat</strong> : <?= $row->nama; ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="col-sm-3">
                    <p><strong>Jam Mulai</strong> : <?= $transaksi['jam_mulai']; ?></p>
                </div>
                <div class="col-sm-3">
                    <p><strong>Jam Selesai</strong> : <?= $transaksi['jam_selesai']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <?php
                    setlocale(LC_ALL, 'id-ID', 'id_ID');
                    $tanggal = strftime("%d %B %Y", strtotime($transaksi['tanggal'])); ?>
                    <p><strong>Tanggal</strong> : <?= $tanggal; ?></p>
                </div>
                <div class="col-sm-3">
                    <p><strong>Foto Rontgen</strong> :
                        <?php if ($transaksi['foto_rontgen'] != 'default.jpg') : ?>
                            <?php
                            $base = base_url('uploads/rontgen/' . $transaksi['foto_rontgen']); ?>
                            <img width="64px" height="64px" src="<?= $base ?>" />
                        <?php else : ?> -
                        <?php endif; ?></p>
                </div>
                <div class="col-sm-6">
                    <?php
                    $jam_mulai = strtotime($transaksi['jam_mulai']);
                    $jam_selesai = strtotime($transaksi['jam_selesai']);
                    $lama_pengerjaan = ($jam_selesai - $jam_mulai) / 60;
                    $diff = abs($jam_selesai - $jam_mulai);
                    $mins = $diff / 60;
                    $jam = floor($mins / 60);
                    $menit = $mins % 60; ?>
                    <p><strong>Lama Pengerjaan Pasien</strong> : <?= $jam . " jam " . $menit . " menit"; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <p><strong>Diagnosa</strong> : </p>
                    <?php foreach ($detail_tindakan as $dt) {
                        if ($dt->id_transaksi == $transaksi['id_transaksi']) {
                            echo '- ' . $dt->diagnosa . '</p>';
                        }
                    } ?>
                </div>
                <div class="col-sm-6">
                    <p><strong>Tindakan</strong> : </p>
                    <?php foreach ($detail_tindakan as $dt) {
                        if ($dt->id_transaksi == $transaksi['id_transaksi']) {
                            $id_tindakan = $dt->id_tindakan;
                            foreach ((array) $tindakan as $t) {
                                if ($t->id_tindakan == $id_tindakan) {
                                    echo '- ' . $t->nama . ' => Rp. ' . number_format($dt->biaya_tindakan, 0, ',', '.') . '</p>';
                                }
                            }
                        }
                    } ?>
                </div>
                <div class="col-sm-3">
                    <p><strong>Obat</strong> : </p>
                    <?php foreach ($detail_obat as $do) {
                        if ($do->id_transaksi == $transaksi['id_transaksi']) {
                            $id_obat = $do->id_obat;
                            foreach ((array) $obat as $o) {
                                if ($o->id_obat == $id_obat) {
                                    echo '- ' . $o->nama . ' x ' . $do->jumlah_obat . '</p>';
                                }
                            }
                        }
                    } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <?php $total_biaya_tindakan = "Rp. " . number_format($transaksi['total_biaya_tindakan'], 0, ',', '.'); ?>
                    <p><strong>Total Biaya Tindakan</strong> : <?= $total_biaya_tindakan; ?></p>
                </div>
                <div class="col-sm-3">
                    <?php $total_biaya_obat = "Rp. " . number_format($transaksi['total_biaya_obat'], 0, ',', '.'); ?>
                    <p><strong>Total Biaya Obat</strong> : <?= $total_biaya_obat;  ?></p>
                </div>
                <div class="col-sm-3">
                    <p><strong>Diskon</strong> :
                        <?php if ($transaksi['diskon'] > 100) {
                            $diskon = "Rp. " . number_format($transaksi['diskon'], 0, ',', '.');
                            echo $diskon;
                        } else {
                            echo $transaksi['diskon'] . "%";
                        } ?></p>
                </div>
                <div class="col-sm-3">
                    <p><strong>Keterangan</strong> : <?= $transaksi['keterangan']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <?php $total_biaya_keseluruhan = "Rp. " . number_format($transaksi['total_biaya_keseluruhan'], 0, ',', '.'); ?>
                    <p><strong>Total Biaya Keseluruhan</strong> : <?= $total_biaya_keseluruhan;  ?></p>
                </div>
                <div class="col-sm-3">
                    <?php $sisa = "Rp. " . number_format($transaksi['sisa'], 0, ',', '.'); ?>
                    <p><strong>Sisa</strong> : <?= $sisa;  ?></p>
                </div>
                <div class="col-sm-3">
                    <p><strong>Status Pembayaran</strong> :
                        <?php if ($transaksi['sisa'] > 0 && $transaksi['sisa'] < $transaksi['total_biaya_keseluruhan']) : ?>
                            Belum lunas
                        <?php elseif ($transaksi['sisa'] == 0) : ?>
                            Lunas
                        <?php else : ?>
                            Belum Melakukan Pembayaran
                        <?php endif; ?> </p>
                </div>
            </div>
            <hr style="border: 1px solid #e0e0e0; border-radius: 5px;">
            <b class="text-gray-800">Riwayat Pembayaran</b>

            <table class="table table-hover table-bordered" id="myTable" width="100%">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jumlah Bayar</th>
                        <th>Kembalian</th>
                        <th>Sisa</th>
                        <th>Metode Pembayaran</th>
                        <th>Ditambahkan Oleh</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pembayaran as $pembayaran) : ?>
                        <?php if ($pembayaran->id_transaksi == $transaksi['id_transaksi']) : ?>
                            <tr>
                                <td>
                                    <?php
                                    setlocale(LC_ALL, 'id-ID', 'id_ID');
                                    $tanggal = strftime("%d %B %Y", strtotime($pembayaran->tanggal));
                                    echo $tanggal; ?>
                                </td>
                                <td>
                                    <?php $jumlah_bayar = "Rp " . number_format($pembayaran->jumlah_bayar, 0, ',', '.');
                                    echo $jumlah_bayar; ?>
                                </td>
                                <td>
                                    <?php $kembalian = "Rp " . number_format($pembayaran->kembalian, 0, ',', '.');
                                    echo $kembalian; ?>
                                </td>
                                <td>
                                    <?php $sisa = "Rp " . number_format($pembayaran->sisa_sesudah, 0, ',', '.');
                                    echo $sisa; ?></td>
                                <td>
                                    <?php if ($pembayaran->metode_pembayaran == 1) : ?>
                                        Cash
                                    <?php elseif ($pembayaran->metode_pembayaran == 2) : ?>
                                        Kredit
                                    <?php elseif ($pembayaran->metode_pembayaran == 3) : ?>
                                        Debit
                                    <?php else : ?>
                                        Transfer
                                    <?php endif; ?> </p>
                                </td>
                                <td>
                                    <?= $pembayaran->added_by; ?>
                                </td>
                                <td>
                                    <button type="button" name="print" id="print" class="btn btn-primary" onclick="printbill(<?= $pembayaran->id_pembayaran; ?>)"><i class="fas fa-print"></i> Print</button>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "responsive": true,
            "paging": false,
            "ordering": false,
            "info": false,
            "searching": false,
            "scrollX": true,
            "scrollCollapse": true
        });
    });

    function printbill(id) {
        var xhr = "<?php echo base_url('pembayaran/print_bill/') ?>" + id;
        var w = window.open(xhr, '', 'width=800,height=800');
    }
</script>