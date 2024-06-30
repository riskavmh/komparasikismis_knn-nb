<?php

namespace App\Controllers;

class MainController extends BaseController
{
    public function index()
    {
        return view('pages/index');
    }

    public function login(){
        return view('pages/login');
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = sha1($this->request->getPost('password'));
        $result = $this->main->login($username, $password);

        if ($result && $result['username']==$username && $result['password']==$password ) {
            session()->set('id', $result['id']);
            session()->set('nama', $result['nama']);
            session()->set('username', $result['username']);
            session()->set('password', $result['password']);
            return redirect()->to('testing');
        } else  {
            session()->setFlashdata('gagal', 'Username / Password salah');
            return redirect()->to('login');
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }

}
