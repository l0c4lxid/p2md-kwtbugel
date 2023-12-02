<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">
                <?= $judul ?>
            </h3>
        </div>
        <div class="card-body">
            <?php echo form_open_multipart('admin/simpanpost') ?>
            <div class="form-group">
                <label for="judul_post">Judul post</label>
                <input type="text" class="form-control" id="judul_post" name="judul_post"
                    placeholder="Masukan Judul post" required>
            </div>
            <div class="form-group">
                <label for="pembuat_post">Pembuat Post</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="pembuat_post" name="pembuat_post"
                        placeholder="Masukan Nama Post" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tanggal_post">Tanggal Post</label>
                <div class="input-group">
                    <input type="date" class="form-control" id="tanggal_post" name="tanggal_post"
                        placeholder="Masukan Tanggal" required>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Foto post</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="foto_post"
                            onchange="previewFile()" accept="image/*" required>
                        <label class="custom-file-label" for="exampleInputFile">Pilih File Foto *rekomedasi
                            400x400</label>
                    </div>
                </div>
                <!-- Display selected file name and preview -->
                <div id="file-preview" class="mt-3 text-center"></div>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('admin/post') ?>" class="btn btn-danger float-left">Batal</a>
            <button type="submit" class="btn btn-outline-success float-right">Submit</button>
        </div>
    </div>
    <!-- /.card-body -->

    <?php form_close() ?>
</div>

<script>
    // Function to handle file input change event
    function previewFile() {
        var fileInput = document.getElementById('exampleInputFile');
        var fileLabel = document.querySelector('.custom-file-label');
        var filePreview = document.getElementById('file-preview');

        // Display selected file name
        fileLabel.textContent = fileInput.files[0].name;

        // Display selected image preview (if it's an image)
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Preview';
                img.style.maxWidth = '400px';  // Set max-width
                img.style.maxHeight = '400px'; // Set max-height

                // Clear the previous preview content
                filePreview.innerHTML = '';

                // Append the new image element to the preview container
                filePreview.appendChild(img);
            };

            reader.readAsDataURL(fileInput.files[0]);
        } else {
            filePreview.innerHTML = ''; // Clear the preview if no file is selected
        }
    }

    // Initialize bs-custom-file-input
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>