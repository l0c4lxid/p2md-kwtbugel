<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">
                <?= $judul ?>
            </h3>
        </div>
        <div class="card-body">
            <?php echo form_open_multipart('admin/simpanproduk') ?>
            <div class="form-group">
                <label for="namaproduk">Nama Produk</label>
                <input type="text" class="form-control" id="namaproduk" name="namaproduk"
                    placeholder="Masukan Nama Produk" required>
            </div>
            <div class="form-group">
                <label for="hargaproduknormal">Harga Produk</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp. </span>
                    </div>
                    <input type="number" class="form-control" id="hargaproduknormal" name="hargaproduknormal"
                        placeholder="Masukan Harga Produk Normal" required>
                </div>
            </div>
            <div class="form-group">
                <label for="hargaprodukdiskon">Harga Produk Diskon</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp. </span>
                    </div>
                    <input type="number" class="form-control" id="hargaprodukdiskon" name="hargaprodukdiskon"
                        placeholder="Masukan Harga Diskon Produk" required>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Foto Produk</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="fotoproduk"
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
            <a href="<?= base_url('admin/produk') ?>" class="btn btn-danger float-left">Batal</a>
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