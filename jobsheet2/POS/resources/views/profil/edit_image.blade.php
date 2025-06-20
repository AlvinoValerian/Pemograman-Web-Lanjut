<form action="{{ url('/profil/' . $user->user_id . '/update_image') }}" method="POST" id="form-edit"
    enctype="multipart/form-data">
    @csrf
    <div id="myModal" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Foto Profil</h5>

                <button type="button" class="close" data-dismiss="modal" aria- label="Close"><span
                        aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Pilih Foto</label>

                    <input type="file" name="image" id="image" class="form-control" accept="image/*"
                        onchange="preview()" required>

                    <small id="error-image" class="error-text form-text text-danger"></small>

                </div>
                <img id="frame" src="" class="img-fluid my-3" max-width="100%" alt="Preview gambar" />
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button class="btn bg-gradient-dark mx-2" type="button" onclick="clearImage()">Clear Image</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(function() {
        bsCustomFileInput.init();
    });

    // Preview Gambar
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }

    // Clear Gambar
    function clearImage() {
        document.getElementById('image').value = null;
        frame.src = "";
    }
</script>
<script>
    $(document).ready(function() {
        // 1. SETUP VALIDASI SEKALI SAJA
        $("#form-edit").validate({
            rules: {
                image: {
                    required: true,
                    extension: "jpg|jpeg|png|gif|svg"
                }
            },
            submitHandler: function(form, event) {
                event.preventDefault(); // ⬅️ Ini mencegah form submit biasa

                var formData = new FormData(form);
                formData.append('_method', 'PUT');

                $.ajax({
                    url: form.action,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            }).then(function() {
                                window.location = response.redirect;
                            });
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            }).then(function() {
                                window.location = response.redirect;
                            });
                        }
                    }
                });
                return false;
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