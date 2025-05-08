<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    function __construct()
    {
        helper('form');
    }

    public function login()
    {
        if ($this->request->getPost()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $dataUser = ['username' => 'admin', 'password' => '827ccb0eea8a706c4c34a16891f84e7b', 'role' => 'admin', 'email' => 'siapbosq8@gmail.com']; // passw 12345

            if ($username == $dataUser['username']) {
                if (md5($password) == $dataUser['password']) {
                    $login_time = date('Y-m-d H:i:s');
                    session()->set([
                        'username' => $dataUser['username'],
                        'role' => $dataUser['role'],
                        'email' => $dataUser['email'],
                        'login_time' => $login_time,
                        'status' => 'sudah login',
                        'isLoggedIn' => TRUE
                    ]);


                    return redirect()->to(base_url('/'));
                } else {
                    session()->setFlashdata('failed', 'Username & Password Salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', 'Username Tidak Ditemukan');
                return redirect()->back();
            }
        } else {
            return view('v_login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
