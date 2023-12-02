<div class="col-md-5">
    <div class="card card-lime">
        <div class="card-header">
            <h3 class="card-title">Data
                <?= $judul ?>
            </h3>

            <!-- /.card-tools -->
        </div>
        <div class="card-body">
            <?php echo form_open('admin/updateakun') ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" required class="form-control " id="username"
                    value="<?= $userUsername; ?>">
            </div>


            <div class="form-group">
                <label for="password">password</label>
                <input type="text" name="password" required class="form-control " id="password" placeholder="password">
            </div><br>


            <div class="row">
                <div class="col-4">
                    <a href="<?= base_url('admin/dashboard'); ?>" class="btn btn-primary btn-block">Kembali</a>
                </div>
                <div class="col-4">

                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-outline-danger btn-block">Simpan</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Data
                <?= $judul_dua ?>
            </h3>
            <div class="card-tools">
            </div>
        </div>
        <?php foreach ($profile as $value): ?>
            <div class="card-body">
                <?php echo form_open_multipart('admin/updateprofile') ?>
                <input type="hidden" id="profileId" value="<?= $value['id_profile'] ?>">
                <input type="hidden" id="profileFoto" value="<?= $value['profile_foto'] ?>">
                <div class="form-group">
                    <label for="exampleInputFile">Foto Home</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input accept="image/*" type="file" class="custom-file-input"
                                id="profile_foto<?= $value['id_profile'] ?>" name="profile_foto"
                                onchange="previewFile(this, <?= $value['id_profile'] ?>)">
                            <label class="custom-file-label" for="profile_foto<?= $value['id_profile'] ?>">
                                <?= $value['profile_foto'] ?>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="profile_wa">Nomer WhastApp</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+62 </span>
                        </div>
                        <input type="number" class="form-control" id="profile_wa" name="profile_wa"
                            value="<?= $value['profile_wa'] ?>" required>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-4">

                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-outline-danger btn-block">Simpan</button>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card card-success">
        <div class="card-body">
            <!-- Display selected file name and preview -->
            <div id="file-preview" class="mt-3 text-center">
                <?php if (!empty($value['profile_foto'])): ?>
                    <img id="preview-image<?= $value['id_profile'] ?>"
                        src="<?= base_url('img/produk/' . $value['profile_foto']) ?>" alt=" Image" width="265" height='265'>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<div class="col-md-12">
    <div class="card card-teal">
        <div class="card-header">
            <h3 class="card-title">Data
                <?= $judul_tiga ?>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah"><i
                        class="fas fa-plus"></i> Tambah
                </button>
            </div>
            <div class="card-tools">
            </div>
        </div>
        <div class="card-body text-center">
            <div class="card-body">
                <table id="example2" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Pekerjaan</th>
                            <th>Isi</th>
                            <th>Foto</th>
                            <th>Ubah</th>
                            <!-- Add other columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($review as $value):
                            ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $value['nama_review'] ?>
                                </td>
                                <td>
                                    <?= $value['pekerjaan_review'] ?>
                                </td>
                                <td>
                                    <?= $value['isi_review'] ?>
                                </td>

                                <td>
                                    <img src="<?= base_url('img/review/' . $value['foto_review']) ?>" alt="review Image"
                                        width="100">
                                </td>
                                <td class='text-center'>
                                    <button class="btn btn-flat btn-outline-warning" data-toggle="modal"
                                        data-target="#modal-edit<?= $value['id_review'] ?>"><i class="fas fa-pencil-alt">
                                            Edit</i></button>
                                    <button class="btn btn-flat btn-outline-danger" data-toggle="modal"
                                        data-target="#modal-hapus<?= $value['id_review'] ?>"><i class="fas fa-trash">
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
</div>

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah
                    <?= $judul_tiga ?>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/tambahreview') ?>
                <div class='form-group'>
                    <label>Nama Reviewer</label>
                    <input type='text' id="nama_review" name="nama_review" class="form-control" required></input>
                </div>
                <div class='form-group'>
                    <label>Pekerjaan Reviewer</label>
                    <input type='text' id="pekerjaan_review" name="pekerjaan_review" class="form-control"
                        required></input>
                </div>
                <div class='form-group'>
                    <label>Isi Reviewer</label>
                    <textarea type='text' id="isi_review" name="isi_review" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="fotoreviwer">Foto Profile Reviewer</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fotoreviwer" name="foto_review"
                                onchange="livepreview()" accept="image/*" required>
                            <label class="custom-file-label" for="fotoreviwer">Pilih File Foto *rekomendasi
                                400x400</label>
                        </div>
                    </div>
                    <!-- Display selected file name and preview -->
                    <div id="livepreview" class="mt-3 text-center"></div>
                </div>
                <script>
                    function livepreview() {
                        var fileInput = document.getElementById('fotoreviwer');
                        var fileLabel = fileInput.nextElementSibling;
                        var livePreviewContainer = document.getElementById('livepreview');

                        // Display selected file name
                        fileLabel.textContent = fileInput.files[0].name;

                        // Display selected image preview (if it's an image)
                        if (fileInput.files && fileInput.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                // Create an image element
                                var img = document.createElement('img');
                                img.src = e.target.result;
                                img.alt = 'Preview';
                                img.style.maxWidth = '200px';  // Set max-width
                                img.style.maxHeight = '200px'; // Set max-height

                                // Clear previous previews and append the new image element
                                livePreviewContainer.innerHTML = '';
                                livePreviewContainer.appendChild(img);
                            };

                            reader.readAsDataURL(fileInput.files[0]);
                        } else {
                            livePreviewContainer.innerHTML = ''; // Clear the preview if no file is selected
                        }
                    }
                </script>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
</div>



<?php foreach ($review as $key => $value) { ?>
    <div class="modal fade" id="modal-edit<?= $value['id_review'] ?>">
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
                    <?php echo form_open_multipart('admin/updatereview/' . $value['id_review']) ?>
                    <div class='form-group'>
                        <label>Nama Reviewer</label>
                        <input type='text' id="nama_review" name="nama_review" class="form-control"
                            value="<?= $value['nama_review'] ?>" required></input>
                    </div>
                    <div class='form-group'>
                        <label>Pekerjaan Reviewer</label>
                        <input type='text' id="pekerjaan_review" name="pekerjaan_review" class="form-control" required
                            value="<?= $value['pekerjaan_review'] ?>"></input>
                    </div>
                    <div class='form-group'>
                        <label>Isi Reviewer</label>
                        <textarea type='text' id="isi_review" name="isi_review" class="form-control"
                            required><?= $value['isi_review'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="editfotolive">Foto Profile Reviewer</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="editfotolive" name="foto_review"
                                    onchange="livev(this, <?= $value['id_review'] ?>)" accept="image/*">
                                <label class="custom-file-label" for="editfotolive">
                                    <?= $value['foto_review'] ?>
                                </label>
                            </div>
                        </div>
                        <!-- Display selected file name and preview -->
                        <div id="previousPreview<?= $value['id_review'] ?>" class="mt-3 text-center">
                            <?php if (!empty($value['foto_review'])): ?>
                                <img src="<?= base_url('img/review/' . $value['foto_review']) ?>" alt="Previous Preview"
                                    width="265" height="265">
                            <?php endif; ?>
                        </div>
                        <div id="editfotolive-preview<?= $value['id_review'] ?>" class="mt-3 text-center"></div>
                        <script>
                            function livev(input, reviewId) {
                                var fileInput = input;
                                var fileLabel = fileInput.nextElementSibling;
                                var livePreviewContainer = document.getElementById('editfotolive-preview' + reviewId);
                                var previousPreviewContainer = document.getElementById('previousPreview' + reviewId);

                                // Display selected file name
                                fileLabel.textContent = fileInput.files[0].name;

                                // Clear previous and new previews
                                livePreviewContainer.innerHTML = '';
                                previousPreviewContainer.innerHTML = '';

                                // Display selected image preview (if it's an image)
                                if (fileInput.files && fileInput.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        // Create an image element for the new preview
                                        var img = document.createElement('img');
                                        img.src = e.target.result;
                                        img.alt = 'New Preview';
                                        img.style.maxWidth = '265px';  // Set max-width
                                        img.style.maxHeight = '265px'; // Set max-height

                                        // Append the new image element to the live preview container
                                        livePreviewContainer.appendChild(img);
                                    };

                                    reader.readAsDataURL(fileInput.files[0]);
                                }
                            }
                        </script>
                    </div>



                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-hapus<?= $value['id_review'] ?>">
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
                        <?= $value['nama_review'] ?> ||
                        <?= $value['pekerjaan_review'] ?>
                    </b>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('admin/hapusreview/' . $value['id_review']) ?>" class="btn btn-danger">Hapus</a>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
<?php } ?>

<!-- Add this script in your HTML file, preferably at the end before </body> -->
<script>
    // Function to handle file input change event
    function previewFile(input, profileId) {
        var fileInput = input;
        var fileLabel = input.nextElementSibling;
        var filePreview = document.getElementById('file-preview');
        var previewImage = document.getElementById('preview-image' + profileId);

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
                    img.style.maxWidth = '265px';  // Set max-width
                    img.style.maxHeight = '265px'; // Set max-height

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

    // Call the previewFile function on page load
    window.onload = function () {
        var profileId = document.getElementById('profileId').value;
        var profileFoto = document.getElementById('profileFoto').value;

        if (profileFoto) {
            var previewImage = document.getElementById('preview-image' + profileId);
            if (previewImage) {
                previewImage.src = '<?= base_url('img/profile/') ?>' + profileFoto;
            }
        }
    };

</script>