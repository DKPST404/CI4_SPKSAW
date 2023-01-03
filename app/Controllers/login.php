<?php

namespace App\Controllers;

use App\Models\M_login;

class Login extends BaseController
{
   
    private $models;

    function __construct()
    {
        $this->models         = new M_login();
    }
    public function index()
    {
        if (session()->get('verify_login')) {
            return redirect()->to(base_url('/'));
        }

        return view('login');
    }

    public function login()
    {
        $request = [
            'username'    => $this->request->getPost('username'),
            'password'     => $this->request->getPost('password')
        ];

        if ($this->validation->run($request, 'login')) {
            $queryResult = $this->models->where('username', $request['username'])->first();

            if ($queryResult) {
                if (md5($request['password']) === $queryResult['password']) {
                    $this->session->set([
                        'id'            => $queryResult['id_user'],
                        'full_name'        => $queryResult['fullname'],
                        'verify_login'     => true
                    ]);

                    $this->session->setFlashdata('message', 'Login sudah berhasil');

                    return redirect()->to('/');
                } else {
                    $this->session->setFlashdata('message', 'Tidak dapat login');
                }
            } else {
                $this->session->setFlashdata('message', 'Tidak dapat login');
            }
        } else {
            $this->session->setFlashdata('errors', $this->validation->getErrors());
        }

        return redirect()->to('/login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
