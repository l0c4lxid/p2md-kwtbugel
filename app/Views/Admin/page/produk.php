<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data
                <?= $judul ?>
            </h3>
            <div class="card-tools">
                <a class="btn btn-success" href="<?= base_url('admin/tambahproduk/'); ?>"><i class="fas fa-plus"></i>
                    Tambah
                </a>
            </div>
        </div>
        <div class="card-body text-center">
            <table id="example2" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Harga Produk</th>
                        <th>Harga Produk Diskon</th>
                        <th>Foto Produk</th>
                        <th>Atur</th>
                        <!-- Add other columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($produk as $value):
                        ?>
                        <tr>
                            <td>
                                <?= $no++ ?>
                            </td>
                            <td>
                                <?= $value['nama_produk'] ?>
                            </td>
                            <td>
                                <?= $value['harga_normal'] ?>
                            </td>
                            <td>
                                <?= $value['harga_diskon'] ?>
                            </td>
                            <td>
                                <img src="<?= base_url('img/produk/' . $value['foto_produk']) ?>" alt="Product Image"
                                    width="100">
                            </td>
                            <td class='text-center'>
                                <button class="btn btn-flat btn-outline-warning" data-toggle="modal"
                                    data-target="#modal-edit<?= $value['id_produk'] ?>"><i class="fas fa-pencil-alt">
                                        Edit</i></button>
                                <button class="btn btn-flat btn-outline-danger" data-toggle="modal"
                                    data-target="#modal-hapus<?= $value['id_produk'] ?>"><i class="fas fa-trash">
                                        Hapus</i></button>
                            </td>
                            <!-- Add other columns as needed -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php foreach ($produk as $key => $value) { ?>
    <div class="modal fade" id="modal-edit<?= $value['id_produk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit
                        <?= $judul ?>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('admin/produk/ubah/' . $value['id_produk']) ?>
                    <div class='form-group'>
                        <label>Nama produk</label>
                        <input type='text' id="nama_produk" name="namaproduk" class="form-control"
                            value="<?= $value['nama_produk'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="hargaproduknormal">Harga Produk normal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp. </span>
                            </div>
                            <input type="number" class="form-control" id="hargaproduknormal" name="hargaproduknormal"
                                value="<?= $value['harga_normal'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hargaprodukdiskon">Harga Produk Diskon</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp. </span>
                            </div>
                            <input type="number" class="form-control" id="hargaprodukdiskon" name="hargaprodukdiskon"
                                value="<?= $value['harga_diskon'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Foto Produk</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input accept="image/*" type="file" class="custom-file-input"
                                    id="fotoproduk<?= $value['id_produk'] ?>" name="fotoproduk"
                                    onchange="previewFile(this, <?= $value['id_produk'] ?>)">
                                <label class="custom-file-label" for="fotoproduk<?= $value['id_produk'] ?>">
                                    <?= $value['foto_produk'] ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Display selected file name and preview -->
                    <div id="file-preview<?= $value['id_produk'] ?>" class="mt-3 text-center">
                        <?php if (!empty($value['foto_produk'])): ?>
                            <img id="preview-image<?= $value['id_produk'] ?>"
                                src="<?= base_url('img/produk/' . $value['foto_produk']) ?>" alt="Produk Image" width="100">
                        <?php endif; ?>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-outline-success">Simpan</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
    </div>

    <script>
        // Function to handle file input change event
        function previewFile(input, productId) {
            var fileInput = input;
            var fileLabel = input.nextElementSibling;
            var filePreview = document.getElementById('file-preview' + productId);
            var previewImage = document.getElementById('preview-image' + productId);

            // Display selected file name
            fileLabel.textContent = fileInput.files[0].name;

            // Display selected image preview (if it's an image)
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    if (!previewImage) {
                        // If there's no existing preview image, create one
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Preview';
                        img.style.maxWidth = '400px';  // Set max-width
                        img.style.maxHeight = '400px'; // Set max-height

                        // Append the new image element to the preview container
                        filePreview.innerHTML = '';
                        filePreview.appendChild(img);
                    } else {
                        // If there's an existing preview image, update its source
                        previewImage.src = e.target.result;
                    }
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



    <div class="modal fade" id="modal-hapus<?= $value['id_produk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus
                        <?= $judul ?>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Ingin Hapus Data ?<br>
                    <b>
                        <?= $value['nama_produk'] ?>
                    </b>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('admin/produk/hapus/' . $value['id_produk']) ?>" class="btn btn-danger">Hapus</a>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
<?php } ?>