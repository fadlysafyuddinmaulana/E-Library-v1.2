</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/dist/js/demo.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/select2/js/select2.full.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- script-page -->

<script>
    <?php
    if (isset($modal_show)) {
        echo $modal_show;
    }
    ?>
</script>

<script>
    document.onkeydown = function(e) {
        if (e.ctrlKey &&
            (e.keyCode === 67 ||
                e.keyCode === 86 ||
                e.keyCode === 85 ||
                e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
    };
    $(document).keypress("u", function(e) {
        if (e.ctrlKey) {
            return false;
        } else {
            return true;
        }
    });
</script>

<script>
    $("#checkall").change(function() {
        $(".checkitem").prop("checked", $(this).prop("checked"))
    });
    $(".checkitem").change(function() {
        if ($(this).prop("checked") == false) {
            $("#checkall").prop("checked", false)
        }
        if ($(".checkitem:checked").length == $(".checkitem").length) {
            $("#checkall").prop("checked", true)
        }
    });
</script>

<script>
    $(function() {
        $('#form-stok').validate({
            rules: {
                'no_awal': {
                    required: true,
                    number: true
                },
                'no_akhir': {
                    required: true,
                    number: true
                }
            },
            messages: {
                'no_awal': {
                    required: "Angka harus disertakan!",
                    number: "Harus Menggunakan Angka!"
                },
                'no_akhir': {
                    required: "Angka harus disertakan!",
                    number: "Harus Menggunakan Angka!"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

<script>
    const flashSuccess = $('.flash-success').data('flashdata');
    if (flashSuccess) {
        Swal.fire({
            title: 'Success',
            text: flashSuccess,
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
            backdrop: `RGBA(40,167,69,0.3)`
        })
    }

    const flashError = $('.flash-error').data('flashdata');
    if (flashError) {
        Swal.fire({
            title: 'Gagal!',
            text: flashError,
            icon: 'error',
            showConfirmButton: false,
            timer: 1500,
            backdrop: `RGBA(354,70,54,0.7)`
        })
    }
</script>

<script type="text/javascript">
    $(function() {
        $('#datetimepicker4').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    });
</script>

<script>
    $(function() {
        $("#table-dashboard").DataTable({
            responsive: true,
            autoWidth: false,
            lengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"],
            ],
            scrollY: "200px",
            // "columnDefs": [{
            //         "targets": [5],
            //         "visible": false,
            //     },
            //     {
            //         "targets": [6],
            //         "visible": false,
            //     },
            //     {
            //         "targets": [7],
            //         "visible": false,
            //     },
            //     {
            //         "targets": [8],
            //         "visible": false,
            //     }
            // ]
        });
    });

 function format(d) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Pengarang:</td>' +
            '<td>' + d[5] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Halaman Buku:</td>' +
            '<td>' + d[6] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Tahun Terbit:</td>' +
            '<td>' + d[7] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Nomor Lemari:</td>' +
            '<td>' + d[8] + '</td>' +
            '</tr>' +  
            '<tr>' +
            '<td>ISBN:</td>' +
            '<td>' + d[9] + '</td>' +
            '</tr>' +               
            '</table>';
    }

    $(function() {
        $("#table-buku").DataTable({
            responsive: true,
            autoWidth: false,
            lengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"],
            ],
            scrollY: "300px",
            "columnDefs": [{
                    "targets": [5],
                    "visible": false,
                },
                {
                    "targets": [6],
                    "visible": false,
                },
                {
                    "targets": [7],
                    "visible": false,
                },
                {
                    "targets": [8],
                    "visible": false,
                },
                {
                    "targets": [9],
                    "visible": false,
                }
            ]
        });

        var table = $('#table-buku').DataTable();
        $('#table-buku tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });
    });

    $(function() {
        $("#table-stok").DataTable({
            responsive: true,
            autoWidth: false,
            lengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"],
            ],
            scrollY: "325px",
            columnDefs: [{
                targets: 1,
                orderable: false
            }]
        });
    });

    $(function() {
        $("#table-rent").DataTable({
            responsive: true,
            autoWidth: false,
            lengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"],
            ],
            scrollY: "325px",
        });
    });

    $(function() {
        $("#table-petugas").DataTable({
            responsive: true,
            autoWidth: false,
            lengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"],
            ],
            scrollY: "325px",
            columnDefs: [{
                targets: 1,
                orderable: false
            }]
        });
    });

    $(function() {
        $("#example1").DataTable({
            responsive: true,
            autoWidth: false,
            lengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"],
            ],
            scrollY: "325px"
        });
    });

    function format_siswa(d) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>NISN:</td>' +
            '<td>' + d[4] + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Jenis Kelamin:</td>' +
            '<td>' + d[6] + '</td>' +
            '</tr>' +
            '<td>Kelas:</td>' +
            '<td>' + d[7] + '</td>' +
            '</tr>' +
            '</tr>' +
            '<td>Jurusan:</td>' +
            '<td>' + d[8] + '</td>' +
            '</tr>' +
            '</table>';
    }

    $(function() {
        $("#table-siswa").DataTable({
            responsive: true,
            autoWidth: false,
            lengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"],
            ],
            scrollY: "325px",
            "columnDefs": [{
                    "targets": [4],
                    "visible": false,
                },
                {
                    "targets": [6],
                    "visible": false,
                },
                {
                    "targets": [7],
                    "visible": false,
                },
                {
                    "targets": [8],
                    "visible": false,
                },

            ]
        });
        var table = $('#table-siswa').DataTable();
        $('#table-siswa tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format_siswa(row.data())).show();
                tr.addClass('shown');
            }
        });
    });
</script>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });
    $('.select2').select2();
    $('[data-mask]').inputmask();
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy', {
        'placeholder': 'yyyy'
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
</body>

</html>