<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data
                <?= $judul ?>
            </h3>
            <div class="card-tools">
                <a class="btn btn-success" href="<?= base_url('admin/tambahpost/'); ?>"><i class="fas fa-plus"></i>
                    Tambah
                </a>
            </div>
        </div>
        <div class="card-body text-center">
            <table id="example2" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Pembuat Post</th>
                        <th>Tanggal Post</th>
                        <th>Foto Produk</th>
                        <th>Atur</th>
                        <!-- Add other columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($post as $value):
                        ?>
                        <tr>
                            <td>
                                <?= $no++ ?>
                            </td>
                            <td>
                                <?= $value['judul_post'] ?>
                            </td>
                            <td>
                                <?= $value['pembuat_post'] ?>
                            </td>
                            <td>
                                <?php
                                $formattedDate = date('Y-m-d', strtotime($value['tanggal_post']));
                                ?>
                                <?= $formattedDate ?>
                            </td>
                            <td>
                                <img src="<?= base_url('img/post/' . $value['foto_post']) ?>" alt="Post Image" width="100">
                            </td>
                            <td class='text-center'>
                                <button class="btn btn-flat btn-outline-warning" data-toggle="modal"
                                    data-target="#modal-edit<?= $value['id_post'] ?>"><i class="fas fa-pencil-alt">
                                        Edit</i></button>
                                <button class="btn btn-flat btn-outline-danger" data-toggle="modal"
                                    data-target="#modal-hapus<?= $value['id_post'] ?>"><i class="fas fa-trash">
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
<?php foreach ($post as $key => $value) { ?>
    <div class="modal fade" id="modal-edit<?= $value['id_post'] ?>">
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
                    <?php echo form_open_multipart('admin/post/ubah/' . $value['id_post']) ?>
                    <div class='form-group'>
                        <label>Judul Post</label>
                        <input type='text' id="judul_post" name="judul_post" class="form-control"
                            value="<?= $value['judul_post'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pembuat_post">Pembuat Post</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="pembuat_post" name="pembuat_post"
                                value="<?= $value['pembuat_post'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_post">Tanggal Post</label>
                        <div class="input-group">
                            <?php
                            $formattedDate = date('Y-m-d', strtotime($value['tanggal_post']));
                            ?>
                            <input type="date" class="form-control" id="tanggal_post" name="tanggal_post"
                                value="<?= $formattedDate ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Foto post</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input accept="image/*" type="file" class="custom-file-input"
                                    id="foto_post<?= $value['id_post'] ?>" name="foto_post"
                                    onchange="previewFile(this, <?= $value['id_post'] ?>)">
                                <label class="custom-file-label" for="foto_post<?= $value['id_post'] ?>">
                                    <?= $value['foto_post'] ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Display selected file name and preview -->
                    <div id="file-preview<?= $value['id_post'] ?>" class="mt-3 text-center">
                        <?php if (!empty($value['foto_post'])): ?>
                            <img id="preview-image<?= $value['id_post'] ?>"
                                src="<?= base_url('img/post/' . $value['foto_post']) ?>" alt="Post Image" width="100">
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
        function previewFile(input, postId) {
            var fileInput = input;
            var fileLabel = input.nextElementSibling;
            var filePreview = document.getElementById('file-preview' + postId);
            var previewImage = document.getElementById('preview-image' + postId);

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



    <div class="modal fade" id="modal-hapus<?= $value['id_post'] ?>">
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
                        <?= $value['judul_post'] ?>
                    </b>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('admin/post/hapus/' . $value['id_post']) ?>" class="btn btn-danger">Hapus</a>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
<?php } ?>