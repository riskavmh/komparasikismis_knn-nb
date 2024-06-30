<?php

namespace App\Libraries;
use App\Models\MainModel;

class Render {
    // public $_sopdso;

    function __construct() {
        // parent::__construct();
        $this->main = new MainModel();
    }

    function auth($render = NULL, $data = []) { 
        if ($render != NULL) {
            if (empty(session()->get('id'))) {
                session()->setFlashdata('gagal', 'Anda harus login dulu.');
                return redirect()->to('login');
            } else {
                $data['user'] = session()->get();
                $data['training'] = $this->main->getTraining();
                $data['testing'] = $this->main->getTesting()->get()->getResult();
                $data['knn'] = $this->main->getKNN()->getResult();
                $data['nbc'] = $this->main->getNBC()->getResult();

                return view($render, $data);
            }
        }
    }

}

?>