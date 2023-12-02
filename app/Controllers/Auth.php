<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class Auth extends BaseController
{
    public function index()
    {
        $session = session();

        // Check if the user is already logged in
        if ($session->get('logged_in')) {
            // Redirect to the dashboard if already logged in
            return redirect()->to('admin/dashboard');
        }
        $data = [
            'judul' => 'Login',
        ];
        return view('admin/v_login', $data);
    }
    public function CekLogin()
    {
        $session = session();

        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new ModelUser();
            $user = $userModel->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Login berhasil, simpan data user ke session
                $sessionData = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'logged_in' => true,
                ];
                $session->set($sessionData);
                return redirect()->to('admin/dashboard');
            } else {
                // Login gagal, tampilkan pesan error dan kembalikan data yang dimasukkan sebelumnya
                $session->setFlashdata('error', 'Gagal Login');
            }
        }
        // var_dump($data);
        // die;
        return redirect()->to(base_url('login'));
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login'));
    }
}