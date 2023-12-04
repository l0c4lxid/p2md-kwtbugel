<?php

namespace App\Controllers;

use App\Models\ModelPost;
use App\Models\ModelProduk;
use App\Models\ModelProfile;
use App\Models\ModelReview;

class Home extends BaseController
{
    public function __construct()
    {
        $this->produkModel = new ModelProduk();
        $this->postModel = new ModelPost();
        $this->profileModel = new ModelProfile();
        $this->reviewModel = new ModelReview();
    }
    public function index(): string
    {
        $produk = $this->produkModel->findAll();
        $profile = $this->profileModel->findAll();
        $review = $this->reviewModel->findAll();

        $data = [
            'judul' => 'Home',
            'produk' => $produk,
            'profile' => $profile,
            'review' => $review
        ];
        // var_dump($data);
        // die;
        return view('v_home', $data);
    }
    public function blog(): string
    {
        $post = $this->postModel->orderBy('tanggal_post', 'DESC')->findAll();

        $profile = $this->profileModel->findAll();

        $data = [
            'judul' => 'Berita Terbaru',
            'profile' => $profile,
            'post' => $post,
        ];
        return view('v_blog', $data);
    }
    public function blog_all($id_post): string
    {
        // Mengambil data post berdasarkan id_post
        $post = $this->postModel->find($id_post);

        $data = [
            'judul' => 'Berita',
            'post' => $post,
        ];

        return view('v_blog_all', $data);
    }

}
