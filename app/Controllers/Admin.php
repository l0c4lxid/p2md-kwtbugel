<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPost;
use App\Models\ModelProduk;
use App\Models\ModelProfile;
use App\Models\ModelReview;
use App\Models\ModelUser;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->userModel = new ModelUser();
        $this->produkModel = new ModelProduk();
        $this->postModel = new ModelPost();
        $this->profileModel = new ModelProfile();
        $this->reviewModel = new ModelReview();
    }
    public function index()
    {
        // Assuming you have ProductModel and PostModel
        $productModel = new ModelProduk();
        $postModel = new ModelPost();
        $reviewModel = new ModelReview();

        // Fetch counts from the database
        $totalProducts = $productModel->countAllResults();
        $totalPosts = $postModel->countAllResults();
        $totalreview = $reviewModel->countAllResults();

        $data = [
            "judul" => "Dashboard",
            "subjudul" => "dashboard",
            "page" => "admin/page/dashboard",
            "totalProducts" => $totalProducts,
            "totalPosts" => $totalPosts,
            "totalreview" => $totalreview
        ];

        return view("admin/v_dashboard", $data);
    }

    public function Produk()
    {
        $produk = $this->produkModel->findAll();
        $data = [
            "judul" => "Produk",
            "subjudul" => "produk",
            "page" => "admin/page/produk",
            'produk' => $produk,
        ];
        return view("admin/v_dashboard", $data);
    }
    public function TambahProduk()
    {
        $data = [
            'judul' => 'Tambah Produk',
            "subjudul" => "produk",
            'page' => 'admin/page/tambahproduk',
        ];
        // Tampilkan view untuk menambahkan user baru
        return view('admin/v_dashboard', $data);
    }
    public function Simpanproduk()
    {
        // Load the session and form validation libraries
        $session = session();
        $validation = \Config\Services::validation();

        // Set the validation rules
        $validation->setRules([
            'namaproduk' => 'required|is_unique[tbl_produk.nama_produk]', // Check if the product name is unique
            'hargaproduknormal' => 'required',
            'hargaprodukdiskon' => 'required',
            'fotoproduk' => 'uploaded[fotoproduk]|mime_in[fotoproduk,image/jpg,image/jpeg,image/png,image/gif]',
        ]);


        // Run the validation
        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, display errors
            $data['validation'] = $validation;
            return view('admin/v_dashboard', $data);
        } else {
            // Validation passed, continue with processing the form data

            // Access the validated data using $this->request->getPost() or $this->request->getFile()
            $namaproduk = $this->request->getPost('namaproduk');
            $hargaproduknormal = $this->request->getPost('hargaproduknormal');
            $hargaprodukdiskon = $this->request->getPost('hargaprodukdiskon');
            $fotoproduk = $this->request->getFile('fotoproduk');

            // Process the image file (you may want to move it to a specific folder, resize, etc.)
            $newFileName = $fotoproduk->getRandomName(); // Generate a new random filename
            $fotoproduk->move('img/produk', $newFileName);

            // Save the product data to the database using the ModelProduk model
            $productModel = new ModelProduk();
            $idUser = $session->get('id_user');
            // Check if a product with the same name already exists
            if ($productModel->where('nama_produk', $namaproduk)->countAllResults() > 0) {
                // Product with the same name already exists, display an error
                $session->setFlashdata('error', 'Product with the same name already exists.');
                return redirect()->to('admin/produk');
            }

            // Insert the new product into the database
            $productModel->insert([
                'id_user' => $idUser,
                'nama_produk' => $namaproduk,
                'harga_normal' => $hargaproduknormal,
                'harga_diskon' => $hargaprodukdiskon,
                'foto_produk' => $newFileName, // Save the generated filename
            ]);

            // Redirect to the admin/produk page or any other desired location
            $session->setFlashdata('success', 'Product added successfully.');
            return redirect()->to('admin/produk');
        }
    }
    public function UpdateProduk($id_produk)
    {
        // Get the existing product data
        $produk = $this->produkModel->find($id_produk);

        // Check if the product exists
        if (!$produk) {
            return redirect()->to('admin/produk')->with('error', 'Produk tidak ditemukan.');
        }

        // Get data from the form
        $nama_produk = $this->request->getPost('namaproduk');
        $harga_normal = $this->request->getPost('hargaproduknormal');
        $harga_diskon = $this->request->getPost('hargaprodukdiskon');

        // Check if a new file has been uploaded
        $fotoproduk = $this->request->getFile('fotoproduk');

        // Validate if the file is uploaded and is valid
        if ($fotoproduk->isValid() && !$fotoproduk->hasMoved()) {
            // Generate a new filename
            $newFileName = $fotoproduk->getRandomName();

            // Move the uploaded file to the destination folder
            $fotoproduk->move('img/produk', $newFileName);

            // Delete the old file if it exists
            if (!empty($produk['foto_produk']) && is_file('img/produk/' . $produk['foto_produk'])) {
                unlink('img/produk/' . $produk['foto_produk']);
            }

            // Update the product data with the new filename
            $data = [
                'nama_produk' => $nama_produk,
                'harga_normal' => $harga_normal,
                'harga_diskon' => $harga_diskon,
                'foto_produk' => $newFileName
            ];
        } else {
            // No new file uploaded, update without changing the photo
            $data = [
                'nama_produk' => $nama_produk,
                'harga_normal' => $harga_normal,
                'harga_diskon' => $harga_diskon,
            ];
        }

        // Update the product in the database
        $this->produkModel->update($id_produk, $data);

        // Redirect to the product list page with a success message
        return redirect()->to('admin/produk')->with('success', 'Product updated successfully.');
    }

    public function HapusProduk($id_produk)
    {
        // Find the product by ID
        $produk = $this->produkModel->find($id_produk);

        if ($produk) {
            // Delete the product
            $this->produkModel->delete($id_produk);

            // Redirect with success message
            return redirect()->to('admin/produk')->with('success', 'Berhasil di hapus');
        } else {
            // Product not found, handle accordingly (redirect or show an error)
            return redirect()->to('admin/produk')->with('error', 'Produk tidak ditemukan.');
        }
    }

    public function Post()
    {
        $post = $this->postModel->findAll();

        $data = [
            "judul" => "Post",
            "subjudul" => "post",
            "page" => "admin/page/post",
            'post' => $post,
        ];
        return view("admin/v_dashboard", $data);
    }
    public function TambahPost()
    {
        $data = [
            'judul' => 'Tambah Post',
            "subjudul" => "post",
            'page' => 'admin/page/tambahpost',
        ];
        // Tampilkan view untuk menambahkan user baru
        return view('admin/v_dashboard', $data);
    }
    public function SimpanPost()
    {
        // Load the session and form validation libraries
        $session = session();
        $validation = \Config\Services::validation();

        // Set the validation rules
        $validation->setRules([
            'judul_post' => 'required|is_unique[tbl_post.judul_post]', // Check if the Post name is unique
            'pembuat_post' => 'required',
            'tanggal_post' => 'required',
            'foto_post' => 'uploaded[foto_post]|mime_in[foto_post,image/jpg,image/jpeg,image/png,image/gif]',
        ]);


        // Run the validation
        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, display errors
            $session->setFlashdata('error', 'Validation failed. Please check your input.');
            return redirect()->to('admin/post');
        } else {
            // Validation passed, continue with processing the form data

            // Access the validated data using $this->request->getPost() or $this->request->getFile()
            $judul_post = $this->request->getPost('judul_post');
            $pembuat_post = $this->request->getPost('pembuat_post');
            $tanggal_post = $this->request->getPost('tanggal_post');
            $foto_post = $this->request->getFile('foto_post');

            // Process the image file (you may want to move it to a specific folder, resize, etc.)
            $newFileName = $foto_post->getRandomName(); // Generate a new random filename
            $foto_post->move('img/post', $newFileName);

            // Save the Post data to the database using the Modelpost model
            $postModel = new ModelPost();
            $idUser = $session->get('id_user');
            // Check if a Post with the same name already exists
            if ($postModel->where('judul_post', $judul_post)->countAllResults() > 0) {
                // Post with the same name already exists, display an error
                $session->setFlashdata('error', 'Post with the same name already exists.');
                return redirect()->to('admin/post');
            }

            // Insert the new Post into the database
            $postModel->insert([
                'id_user' => $idUser,
                'judul_post' => $judul_post,
                'pembuat_post' => $pembuat_post,
                'tanggal_post' => $tanggal_post,
                'foto_post' => $newFileName, // Save the generated filename
            ]);

            // Redirect to the admin/post page or any other desired location
            $session->setFlashdata('success', 'Post added successfully.');
            return redirect()->to('admin/post');
        }
    }
    public function UpdatePost($id_post)
    {
        // Get the existing Post data
        $post = $this->postModel->find($id_post);

        // Check if the Post exists
        if (!$post) {
            return redirect()->to('admin/post')->with('error', 'post tidak ditemukan.');
        }

        // Get data from the form
        $judul_post = $this->request->getPost('judul_post');
        $pembuat_post = $this->request->getPost('pembuat_post');
        $tanggal_post = $this->request->getPost('tanggal_post');

        // Check if a new file has been uploaded
        $foto_post = $this->request->getFile('foto_post');

        // Validate if the file is uploaded and is valid
        if ($foto_post->isValid() && !$foto_post->hasMoved()) {
            // Generate a new filename
            $newFileName = $foto_post->getRandomName();

            // Move the uploaded file to the destination folder
            $foto_post->move('img/post', $newFileName);

            // Delete the old file if it exists
            if (!empty($post['foto_post']) && is_file('img/post/' . $post['foto_post'])) {
                unlink('img/post/' . $post['foto_post']);
            }

            // Update the Post data with the new filename
            $data = [
                'judul_post' => $judul_post,
                'pembuat_post' => $pembuat_post,
                'tanggal_post' => $tanggal_post,
                'foto_post' => $newFileName
            ];
        } else {
            // No new file uploaded, update without changing the photo
            $data = [
                'judul_post' => $judul_post,
                'pembuat_post' => $pembuat_post,
                'tanggal_post' => $tanggal_post,
            ];
        }

        // Update the Post in the database
        $this->postModel->update($id_post, $data);

        // Redirect to the Post list page with a success message
        return redirect()->to('admin/post')->with('success', 'Post updated successfully.');
    }

    public function HapusPost($id_post)
    {
        // Find the Post by ID
        $post = $this->postModel->find($id_post);

        if ($post) {
            // Delete the Post
            $this->postModel->delete($id_post);

            // Redirect with success message
            return redirect()->to('admin/post')->with('success', 'Berhasil di hapus');
        } else {
            // Post not found, handle accordingly (redirect or show an error)
            return redirect()->to('admin/post')->with('error', 'post tidak ditemukan.');
        }
    }
    public function Akun()
    {
        $session = session();
        $profile = $this->profileModel->findAll();
        $review = $this->reviewModel->findAll();

        $userUsername = $session->get('username');
        $data = [
            "judul" => "Pengaturan ",
            "subjudul" => "pengaturan",
            "judul_dua" => "Profile",
            "judul_tiga" => "Review",
            "page" => "admin/page/pengaturan",
            'userUsername' => $userUsername,
            'profile' => $profile,
            'review' => $review,

        ];
        return view("admin/v_dashboard", $data);
    }
    public function UpdateAkun()
    {
        $session = session();
        $userId = $session->get('id_user');
        $newUsername = $this->request->getPost('username');
        $newPassword = $this->request->getPost('password');

        // Pastikan untuk menghash password sebelum menyimpannya ke database
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Lakukan proses update data di database
        $userModel = new ModelUser();
        $userModel->update($userId, [
            'username' => $newUsername,
            'password' => $hashedPassword,
        ]);
        // Setelah berhasil disimpan, tampilkan pesan sukses atau lakukan redirect
        $session = session();
        $session->setFlashdata('success', '<div class="card card-warning shadow">
        <div class="card-header col-md-12">
            <h3 class="card-title">Username / Password Telah Di Ubah !!</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                        class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
    </div>');
        return redirect()->to('admin/pengaturan');
    }
    // Admin Controller
    // Admin Controller
    public function updateProfile()
    {

        $session = session();
        $userId = $session->get('id_user');

        // Assuming you have a model called ProfileModel to interact with the profiles table
        $profileModel = new ModelProfile();

        // Validate the form data (you might want to add more validation rules)
        $validation = \Config\Services::validation();
        $validation->setRules([
            'profile_foto' => 'uploaded[profile_foto]|mime_in[profile_foto,image/jpg,image/jpeg,image/png,image/gif]',
            'profile_wa' => 'required|numeric',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, handle errors
            $data['validation'] = $validation;
            // Add other necessary data
            return view('admin/v_dashboard', $data);
        }

        // Get existing profile data
        $existingProfile = $profileModel->find($userId);

        // Check if the existing file exists and delete it
        if (!empty($existingProfile['profile_foto'])) {
            $existingFilePath = 'img/profile/' . $existingProfile['profile_foto'];
            if (file_exists($existingFilePath)) {
                unlink($existingFilePath);
            }
        }

        // Process the image file
        $profileFoto = $this->request->getFile('profile_foto');
        $newFileName = $profileFoto->getRandomName();
        $profileFoto->move('img/profile', $newFileName);

        // Get other form data
        $profileWa = $this->request->getPost('profile_wa');

        // Update the profile data in the database
        $profileModel->update($userId, [
            'profile_foto' => $newFileName,
            'profile_wa' => $profileWa,
        ]);

        // Redirect to the admin pengaturan page
        return redirect()->to('admin/akun');
    }

    public function TambahReview()
    {
        $session = session();
        // Validasi form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_review' => 'required',
            'pekerjaan_review' => 'required',
            'isi_review' => 'required',
            'foto_review' => 'uploaded[foto_review]|mime_in[foto_review,image/jpg,image/jpeg,image/png,image/gif]|max_size[foto_review,4096]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan dengan pesan kesalahan
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Upload file foto_review
        $fotoReview = $this->request->getFile('foto_review');
        $newFileName = $fotoReview->getRandomName();
        $fotoReview->move('img/review', $newFileName);

        // Simpan data ke database
        $reviewModel = new ModelReview(); // Sesuaikan dengan nama model yang Anda gunakan
        $idUser = $session->get('id_user');

        $reviewModel->save([
            'id_user' => $idUser,
            'nama_review' => $this->request->getPost('nama_review'),
            'pekerjaan_review' => $this->request->getPost('pekerjaan_review'),
            'isi_review' => $this->request->getPost('isi_review'),
            'foto_review' => $newFileName,
        ]);

        // Redirect ke halaman yang sesuai
        return redirect()->to('admin/akun');

    }
    public function updateReview($idReview)
    {
        $session = session();

        // Validasi form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_review' => 'required',
            'pekerjaan_review' => 'required',
            'isi_review' => 'required',
            'foto_review' => 'mime_in[foto_review,image/jpg,image/jpeg,image/png,image/gif]|max_size[foto_review,4096]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan dengan pesan kesalahan
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Ambil data review dari database berdasarkan ID
        $reviewModel = new ModelReview(); // Sesuaikan dengan nama model yang Anda gunakan
        $review = $reviewModel->find($idReview);

        // Pastikan review dengan ID tersebut ditemukan
        if (!$review) {
            // Redirect atau tampilkan pesan error
            return redirect()->to('admin/akun')->with('error', 'Review not found');
        }

        // Ambil foto_review yang lama
        $oldFotoReview = $review['foto_review'];

        // Cek apakah ada file foto_review baru diupload
        $newFotoReview = $this->request->getFile('foto_review');
        if ($newFotoReview->isValid() && !$newFotoReview->hasMoved()) {
            // Jika ada file baru diupload, pindahkan file
            $newFileName = $newFotoReview->getRandomName();
            $newFotoReview->move('img/review', $newFileName);

            // Hapus foto_review lama jika file baru diupload
            if ($oldFotoReview && file_exists('img/review/' . $oldFotoReview)) {
                unlink('img/review/' . $oldFotoReview);
            }
        } else {
            // Jika tidak ada file baru diupload, gunakan foto_review yang lama
            $newFileName = $oldFotoReview;
        }

        // Update data review di database
        $reviewModel->update($idReview, [
            'nama_review' => $this->request->getPost('nama_review'),
            'pekerjaan_review' => $this->request->getPost('pekerjaan_review'),
            'isi_review' => $this->request->getPost('isi_review'),
            'foto_review' => $newFileName,
        ]);

        // Redirect ke halaman yang sesuai
        return redirect()->to('admin/akun')->with('success', 'Review updated successfully');
    }


    public function HapusReview($id_review)
    {
        // Find the review by ID
        $review = $this->reviewModel->find($id_review);

        if ($review) {
            // Delete the review
            $this->reviewModel->delete($id_review);

            // Redirect with success message
            return redirect()->to('admin/akun')->with('success', 'Berhasil di hapus');
        } else {
            // akun not found, handle accordingly (redirect or show an error)
            return redirect()->to('admin/akun')->with('error', 'review tidak ditemukan.');
        }
    }
}
