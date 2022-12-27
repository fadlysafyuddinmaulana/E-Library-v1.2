    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/dist/js/adminlte.min.js"></script>
    <!-- jquery-validation -->
    <script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/sweetalert2/sweetalert2.all.min.js"></script>


    <!-- script-page -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#form-validation').validate({
                rules: {
                    'val-nik': {
                        required: true,
                        number: true
                    },
                    'val-cellphone': {
                        required: true,
                        number: true
                    },
                    'val-username': {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    'val-nik': {
                        required: "Masukkan NIK anda!",
                        number: "Harus Menggunakan Angka!"
                    },
                    'val-cellphone': {
                        required: "Masukkan Nomor anda!",
                        number: "Harus Menggunakan Angka!"
                    },
                    'val-username': {
                        required: "Masukkan username anda!",
                        minlength: "Karakter harus lebih dari 3"
                    },
                    terms: "Anda harus mencentang terlebih dahulu"
                }
            });
        });
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
    </body>

    </html>