<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthenticateUser extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function register()
    {
        if ($this->request->getPost()) {
            //lakukan validasi untuk data yang di post
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'register');
            $errors = $this->validation->getErrors();

            //jika tidak ada errors jalanakan
            if (!$errors) {
                $userModel = new \App\Models\PenggunaModel();

                $user = new \App\Entities\Pengguna();

                $user->username = $this->request->getPost('username');
                $user->password = $this->request->getPost('password');

                $user->created_by = 0;
                $user->created_date = date("Y-m-d H:i:s");

                $userModel->save($user);

                return view('/pages/authenticate/login');
            }

            $this->session->setFlashdata('errors', $errors);
        }

        return view("/pages/authenticate/register");
    }

    public function login()
    {
        if ($this->request->getPost()) {
            //lakukan validasi untuk data yang di post
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'login');
            $errors = $this->validation->getErrors();

            if ($errors) {
                return view('/pages/authenticate/login');
            }

            $userModel = new \App\Models\PenggunaModel();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $userModel->where('username', $username)->first();

            if ($user) {
                $salt = $user->salt;
                if ($user->password !== md5($salt . $password)) {
                    $this->session->setFlashdata('errors', ['Password Salah']);
                } else {
                    $sessData = [
                        'username' => $user->username,
                        'id' => $user->id,
                        'role' => $user->role,
                        'isLoggedIn' => TRUE
                    ];

                    $this->session->set($sessData);

                    return redirect()->to('/');
                }
            } else {
                $this->session->setFlashdata('errors', ['User Tidak Ditemukan']);
            }
        }
        return view("/pages/authenticate/login");
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to("login");
    }
}
