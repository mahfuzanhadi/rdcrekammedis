<script type="text/javascript">
    var save_method;

    function delete_data(id) {
        bootbox.confirm("Anda yakin ingin menghapus data ini?", function(result) {
            if (result)
                $.ajax({
                    url: "<?= base_url('obat/delete/'); ?>" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        bootbox.alert("Data berhasil dihapus!", function() {
                            location.reload();
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        bootbox.alert('Gagal menghapus data!');
                    }
                });
        });
    }
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data obat <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- DataTables -->
    <div class="card mb-3">
        <div class="card-header">
            <a href="<?= base_url('obat/add'); ?>" class="btn btn-info btn-sm"><i class="fas fa-plus"></i> Add Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Satuan</th>
                            <th>Jenis</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script src="https://cdn.datatables.net/plug-ins/1.10.21/sorting/natural.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        var dataTable = $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "scrollX": true,
            "order": [],
            "lengthMenu": [10, 20, 50],
            "ajax": {
                url: "<?= base_url('obat/fetch_data'); ?>",
                type: "POST"
            },
            "columnDefs": [{
                    "targets": [0, 6],
                    "orderable": false
                },
                {
                    "width": "15px",
                    "className": "text-left",
                    "targets": 0
                },
                {
                    "width": "250px",
                    "targets": 1
                },
                {
                    "width": "60px",
                    "targets": 2
                },
                {
                    "width": "60px",
                    "targets": 3
                },
                {
                    "type": 'natural',
                    "width": "60px",
                    "targets": 4
                },
                {
                    "width": "60px",
                    "targets": 5,
                    render: $.fn.dataTable.render.number('.')
                },
                {
                    "width": "60px",
                    "targets": 6
                },
                {
                    "width": "80px",
                    "targets": 7
                },
            ]
        });
    });
</script>

</div>
<!-- End of Main Content -->