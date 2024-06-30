<?php

namespace App\Models;

use CodeIgniter\Model;

class MainModel extends Model
{
    // protected $DBGroup = 'db_peminjaman';
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table = 'tb_user';
    }

    public function login($username, $password){
        return $this->db->table('user')
        ->where('username',$username)
        ->where('password',$password)
        ->get()->getRowArray();
    }

    public function getUser(){
        return $this->db->table('user')
        ->select('*')
        ->orderBy("id", "asc")
        ->get()->getResult();
    }

    public function getTraining(){
        return $this->db->table('data_training')
        ->select('*')
        ->orderBy("id", "asc")
        ->get()->getResult();
    }

    public function getTesting(){
        return $this->db->table('data_testing')
        ->select('*')
        ->orderBy("id", "asc");
    }

    public function getKNN(){
        return $this->db->table('uji_knn')
        ->select('*')
        ->get();
    }

    public function getNBC(){
        return $this->db->table('uji_nbc')
        ->select('*')
        ->get();
    }

    /*public function create($data,$table) {
        return $this->db->insert($table,$data)
    }*/

    /*public function create($data,$table) {
        $this->db->insert($table,$data);
    }

    public function edit($data,$table) {
        return $this->db->get_where($table,$data);
    }*/
    /*public function update($where,$data,$table) {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function delete($where,$table) {
        $this->db->where($where);
        $this->db->delete($table);
    }*/


}